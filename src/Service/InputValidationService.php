<?php

namespace App\Service;

use App\Entity\Commande;

class InputValidationService
{
    private const ALLOWED_EMAIL_DOMAIN_PREFIXES = ['gmail', 'outlook', 'esprit'];

    public function validateEmail(string $email): array
    {
        $pattern = '/^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';
        
        if (empty($email)) {
            return ['valid' => false, 'message' => 'Email is required'];
        }
        
        if (!preg_match($pattern, $email)) {
            return ['valid' => false, 'message' => 'Invalid email format'];
        }

        $domain = strtolower((string) substr(strrchr($email, '@') ?: '', 1));
        if ('' === $domain) {
            return ['valid' => false, 'message' => 'Invalid email domain'];
        }

        $domainPrefix = strtolower((string) strtok($domain, '.'));
        if (!in_array($domainPrefix, self::ALLOWED_EMAIL_DOMAIN_PREFIXES, true)) {
            return ['valid' => false, 'message' => 'Email must use a Gmail, Outlook, or Esprit address'];
        }
        
        return ['valid' => true, 'message' => ''];
    }

    public function validateTunisianPhone(?string $phone): array
    {
        if ($phone === null || $phone === '') {
            return ['valid' => true, 'message' => ''];
        }

        $phone = $this->normalizeDigits($phone);
        
        $pattern = '/^[259][0-9]{7}$/';
        
        if (!preg_match($pattern, $phone)) {
            return ['valid' => false, 'message' => 'Invalid Tunisian phone number (must be 8 digits starting with 2, 5, or 9)'];
        }
        
        return ['valid' => true, 'message' => ''];
    }

    public function validateRequiredTunisianPhone(?string $phone, string $fieldName = 'Phone number'): array
    {
        if ($phone === null || '' === trim($phone)) {
            return ['valid' => false, 'message' => $fieldName . ' is required'];
        }

        return $this->validateTunisianPhone($phone);
    }

    public function normalizePhone(?string $phone): ?string
    {
        if ($phone === null) {
            return null;
        }

        $phone = $this->normalizeDigits($phone);

        return '' === $phone ? null : $phone;
    }

    public function validatePassword(string $password): array
    {
        if (strlen($password) < 8) {
            return ['valid' => false, 'message' => 'Password must be at least 8 characters long'];
        }
        
        if (!preg_match('/[A-Z]/', $password)) {
            return ['valid' => false, 'message' => 'Password must contain at least one uppercase letter'];
        }
        
        if (!preg_match('/[0-9]/', $password)) {
            return ['valid' => false, 'message' => 'Password must contain at least one digit'];
        }
        
        return ['valid' => true, 'message' => ''];
    }

    public function validateName(string $name, string $fieldName = 'Name'): array
    {
        if (strlen($name) < 2) {
            return ['valid' => false, 'message' => $fieldName . ' must be at least 2 characters long'];
        }
        
        if (!preg_match('/^[A-Za-z\s\-]+$/', $name)) {
            return ['valid' => false, 'message' => $fieldName . ' can only contain letters, spaces, and hyphens'];
        }
        
        return ['valid' => true, 'message' => ''];
    }

    public function validateBirthDate(?\DateTimeInterface $date): array
    {
        if ($date === null) {
            return ['valid' => true, 'message' => ''];
        }
        
        $today = new \DateTime();
        $age = $date->diff($today)->y;
        
        if ($age < 16) {
            return ['valid' => false, 'message' => 'You must be at least 16 years old'];
        }
        
        return ['valid' => true, 'message' => ''];
    }

    public function validateRequiredBirthDate(?\DateTimeInterface $date): array
    {
        if ($date === null) {
            return ['valid' => false, 'message' => 'Birth date is required'];
        }

        return $this->validateBirthDate($date);
    }

    public function validateBirthDateInput(?string $date, bool $required = false): array
    {
        if (null === $date || '' === trim($date)) {
            return $required
                ? ['valid' => false, 'message' => 'Birth date is required']
                : ['valid' => true, 'message' => ''];
        }

        $parsedDate = $this->parseDate($date);
        if (null === $parsedDate) {
            return ['valid' => false, 'message' => 'Invalid birth date'];
        }

        return $this->validateBirthDate($parsedDate);
    }

    public function parseDate(?string $date): ?\DateTimeImmutable
    {
        if (null === $date || '' === trim($date)) {
            return null;
        }

        try {
            return new \DateTimeImmutable(trim($date));
        } catch (\Exception) {
            return null;
        }
    }

    public function validateVerificationCode(?string $code): array
    {
        if ($code === null || '' === trim($code)) {
            return ['valid' => false, 'message' => 'Verification code is required'];
        }

        $code = trim($code);
        if (!preg_match('/^[0-9]{6}$/', $code)) {
            return ['valid' => false, 'message' => 'Verification code must contain exactly 6 digits'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateResetChannel(?string $channel): array
    {
        if ($channel === null || '' === trim($channel)) {
            return ['valid' => false, 'message' => 'Please choose whether to send the code by email or SMS'];
        }

        if (!in_array($channel, ['email', 'sms'], true)) {
            return ['valid' => false, 'message' => 'Invalid verification channel'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateImageUpload(?string $mimeType, ?int $size): array
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (null === $mimeType || '' === $mimeType) {
            return ['valid' => false, 'message' => 'Invalid image type'];
        }

        if (!in_array(strtolower($mimeType), $allowedMimeTypes, true)) {
            return ['valid' => false, 'message' => 'Profile photo must be a JPG, PNG, or WebP image'];
        }

        if (null !== $size && $size > 5 * 1024 * 1024) {
            return ['valid' => false, 'message' => 'Profile photo cannot be larger than 5 MB'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateNote(?string $note): array
    {
        if ($note === null || $note === '') {
            return ['valid' => false, 'message' => 'Please select a rating'];
        }
        
        if (!in_array($note, ['1', '2', '3', '4', '5'])) {
            return ['valid' => false, 'message' => 'Invalid rating value'];
        }
        
        return ['valid' => true, 'message' => ''];
    }

    public function validateFeedbackTitle(?string $title): array
    {
        if ($title === null || '' === trim($title)) {
            return ['valid' => false, 'message' => 'Feedback title is required'];
        }

        $title = trim($title);
        if (mb_strlen($title) < 5) {
            return ['valid' => false, 'message' => 'Feedback title must be at least 5 characters long'];
        }

        if (mb_strlen($title) > 120) {
            return ['valid' => false, 'message' => 'Feedback title cannot be longer than 120 characters'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateFeedbackMood(?string $mood): array
    {
        $allowedMoods = ['love', 'happy', 'neutral', 'sad', 'angry'];

        if ($mood === null || '' === trim($mood)) {
            return ['valid' => false, 'message' => 'Please choose the emoji that best matches your experience'];
        }

        if (!in_array($mood, $allowedMoods, true)) {
            return ['valid' => false, 'message' => 'Invalid feedback mood selected'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateRecommendation(?string $recommendation): array
    {
        if ($recommendation === null || '' === trim($recommendation)) {
            return ['valid' => false, 'message' => 'Please tell us whether you would recommend this experience'];
        }

        if (!in_array($recommendation, ['yes', 'no'], true)) {
            return ['valid' => false, 'message' => 'Invalid recommendation value'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateQuantity(?string $quantity): array
    {
        if ($quantity === null || trim($quantity) === '') {
            return ['valid' => false, 'message' => 'Quantity is required'];
        }

        if (!ctype_digit($quantity) || (int) $quantity < 1) {
            return ['valid' => false, 'message' => 'Quantity must be a positive whole number'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateDeliveryAddress(?string $address): array
    {
        if ($address === null || '' === trim($address)) {
            return ['valid' => false, 'message' => 'Delivery address is required'];
        }

        $address = trim($address);

        if (mb_strlen($address) < 10) {
            return ['valid' => false, 'message' => 'Delivery address must contain enough detail'];
        }

        if (mb_strlen($address) > 255) {
            return ['valid' => false, 'message' => 'Delivery address cannot be longer than 255 characters'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateTunisianGovernorate(?string $governorate): array
    {
        if ($governorate === null || '' === trim($governorate)) {
            return ['valid' => false, 'message' => 'Please select your governorate in Tunisia'];
        }

        $governorate = trim($governorate);
        if (!in_array($governorate, Commande::getTunisiaGovernorates(), true)) {
            return ['valid' => false, 'message' => 'Invalid governorate selected'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateDeliveryComment(?string $comment): array
    {
        if ($comment === null || '' === trim($comment)) {
            return ['valid' => false, 'message' => 'Please add a short delivery comment explaining exactly where you are'];
        }

        $comment = trim($comment);
        if (mb_strlen($comment) < 5) {
            return ['valid' => false, 'message' => 'Delivery comment must be at least 5 characters long'];
        }

        if (mb_strlen($comment) > 500) {
            return ['valid' => false, 'message' => 'Delivery comment cannot be longer than 500 characters'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateComment(?string $comment): array
    {
        if ($comment === null || trim($comment) === '') {
            return ['valid' => false, 'message' => 'Comment is required'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateFeedbackComment(?string $comment): array
    {
        if ($comment === null || trim($comment) === '') {
            return ['valid' => false, 'message' => 'Feedback comment is required'];
        }

        $comment = trim($comment);
        if (mb_strlen($comment) < 20) {
            return ['valid' => false, 'message' => 'Feedback comment must be at least 20 characters long'];
        }

        if (mb_strlen($comment) > 1500) {
            return ['valid' => false, 'message' => 'Feedback comment cannot be longer than 1500 characters'];
        }

        return ['valid' => true, 'message' => ''];
    }

    public function validateAll(array $data): array
    {
        $errors = [];

        if (isset($data['email'])) {
            $result = $this->validateEmail($data['email']);
            if (!$result['valid']) {
                $errors['email'] = $result['message'];
            }
        }

        if (isset($data['telephone'])) {
            $result = $this->validateTunisianPhone($data['telephone']);
            if (!$result['valid']) {
                $errors['telephone'] = $result['message'];
            }
        }

        if (isset($data['password'])) {
            $result = $this->validatePassword($data['password']);
            if (!$result['valid']) {
                $errors['password'] = $result['message'];
            }
        }

        if (isset($data['nom'])) {
            $result = $this->validateName($data['nom'], 'Last name');
            if (!$result['valid']) {
                $errors['nom'] = $result['message'];
            }
        }

        if (isset($data['prenom'])) {
            $result = $this->validateName($data['prenom'], 'First name');
            if (!$result['valid']) {
                $errors['prenom'] = $result['message'];
            }
        }

        if (isset($data['dateNaissance'])) {
            $date = $data['dateNaissance'] instanceof \DateTimeInterface 
                ? $data['dateNaissance'] 
                : new \DateTime($data['dateNaissance']);
            $result = $this->validateBirthDate($date);
            if (!$result['valid']) {
                $errors['dateNaissance'] = $result['message'];
            }
        }

        return $errors;
    }

    private function normalizeDigits(string $value): string
    {
        return preg_replace('/[^0-9]/', '', $value) ?? '';
    }
}
