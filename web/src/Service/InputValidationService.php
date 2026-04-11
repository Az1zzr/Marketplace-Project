<?php

namespace App\Service;

class InputValidationService
{
    public function validateEmail(string $email): array
    {
        $pattern = '/^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';
        
        if (empty($email)) {
            return ['valid' => false, 'message' => 'Email is required'];
        }
        
        if (!preg_match($pattern, $email)) {
            return ['valid' => false, 'message' => 'Invalid email format'];
        }
        
        return ['valid' => true, 'message' => ''];
    }

    public function validateTunisianPhone(?string $phone): array
    {
        if ($phone === null || $phone === '') {
            return ['valid' => true, 'message' => ''];
        }

        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        $pattern = '/^[2459][0-9]{7}$/';
        
        if (!preg_match($pattern, $phone)) {
            return ['valid' => false, 'message' => 'Invalid Tunisian phone number (must be 8 digits starting with 2, 4, 5, or 9)'];
        }
        
        return ['valid' => true, 'message' => ''];
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

        if (mb_strlen(trim($address)) < 10) {
            return ['valid' => false, 'message' => 'Delivery address must contain enough detail'];
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
}
