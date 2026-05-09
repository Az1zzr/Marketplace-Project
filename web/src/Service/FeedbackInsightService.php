<?php

namespace App\Service;

use App\Entity\Feedback;

class FeedbackInsightService
{
    public const TOPIC_QUALITY = 'quality';
    public const TOPIC_DELIVERY = 'delivery';
    public const TOPIC_PACKAGING = 'packaging';
    public const TOPIC_PRICE = 'price';
    public const TOPIC_SERVICE = 'service';
    public const TOPIC_USABILITY = 'usability';
    public const TOPIC_GENERAL = 'general';

    public const PRIORITY_HIGH = 'high';
    public const PRIORITY_MEDIUM = 'medium';
    public const PRIORITY_LOW = 'low';

    private const TOPIC_LABELS = [
        self::TOPIC_QUALITY => 'Qualite',
        self::TOPIC_DELIVERY => 'Livraison',
        self::TOPIC_PACKAGING => 'Emballage',
        self::TOPIC_PRICE => 'Prix',
        self::TOPIC_SERVICE => 'Service',
        self::TOPIC_USABILITY => 'Utilisation',
        self::TOPIC_GENERAL => 'General',
    ];

    private const PRIORITY_LABELS = [
        self::PRIORITY_HIGH => 'Haute',
        self::PRIORITY_MEDIUM => 'Moyenne',
        self::PRIORITY_LOW => 'Basse',
    ];

    public function analyze(Feedback $feedback, array $sentiment, ?int $responseCount = null): array
    {
        $comment = mb_strtolower($feedback->getCommentaire() ?? '');
        $topic = $this->detectTopic($feedback, $comment);
        $priority = $this->detectPriority($feedback, $sentiment);
        $responseCount ??= $feedback->getReponses()->count();
        $isUnanswered = 0 === $responseCount;
        $needsAttention = self::PRIORITY_HIGH === $priority || ($isUnanswered && self::PRIORITY_MEDIUM === $priority);

        return [
            'topic' => $topic,
            'topicLabel' => self::TOPIC_LABELS[$topic],
            'topicBadgeClass' => $this->getTopicBadgeClass($topic),
            'priority' => $priority,
            'priorityLabel' => self::PRIORITY_LABELS[$priority],
            'priorityBadgeClass' => $this->getPriorityBadgeClass($priority),
            'needsAttention' => $needsAttention,
            'isUnanswered' => $isUnanswered,
            'responseCount' => $responseCount,
        ];
    }

    public function matchesFilters(array $insight, string $topicFilter, string $priorityFilter, string $attentionFilter): bool
    {
        if ('' !== $topicFilter && ($insight['topic'] ?? null) !== $topicFilter) {
            return false;
        }

        if ('' !== $priorityFilter && ($insight['priority'] ?? null) !== $priorityFilter) {
            return false;
        }

        if ('attention' === $attentionFilter && !($insight['needsAttention'] ?? false)) {
            return false;
        }

        if ('unanswered' === $attentionFilter && !($insight['isUnanswered'] ?? false)) {
            return false;
        }

        return true;
    }

    public function summarize(array $feedbacksWithInsights): array
    {
        $topicCounts = [];
        $urgentCount = 0;
        $attentionCount = 0;
        $unansweredCount = 0;

        foreach ($feedbacksWithInsights as $item) {
            $insight = $item['insight'] ?? null;
            if (!is_array($insight)) {
                continue;
            }

            $topic = (string) ($insight['topic'] ?? self::TOPIC_GENERAL);
            $topicCounts[$topic] = ($topicCounts[$topic] ?? 0) + 1;

            if (($insight['priority'] ?? null) === self::PRIORITY_HIGH) {
                ++$urgentCount;
            }

            if (($insight['needsAttention'] ?? false) === true) {
                ++$attentionCount;
            }

            if (($insight['isUnanswered'] ?? false) === true) {
                ++$unansweredCount;
            }
        }

        arsort($topicCounts);
        $topTopic = array_key_first($topicCounts) ?? self::TOPIC_GENERAL;

        return [
            'total' => count($feedbacksWithInsights),
            'urgentCount' => $urgentCount,
            'attentionCount' => $attentionCount,
            'unansweredCount' => $unansweredCount,
            'topTopic' => $topTopic,
            'topTopicLabel' => self::TOPIC_LABELS[$topTopic],
        ];
    }

    public function getTopicChoices(): array
    {
        return self::TOPIC_LABELS;
    }

    public function getPriorityChoices(): array
    {
        return self::PRIORITY_LABELS;
    }

    private function detectTopic(Feedback $feedback, string $comment): string
    {
        if ($feedback->isDeliveryFeedback() || $this->containsAny($comment, ['livraison', 'livreur', 'driver', 'courier', 'retard', 'delayed'])) {
            return self::TOPIC_DELIVERY;
        }

        if ($this->containsAny($comment, ['emballage', 'package', 'packaging', 'boite', 'box'])) {
            return self::TOPIC_PACKAGING;
        }

        if ($this->containsAny($comment, ['prix', 'price', 'cher', 'chere', 'expensive', 'cheap', 'value'])) {
            return self::TOPIC_PRICE;
        }

        if ($this->containsAny($comment, ['service', 'support', 'staff', 'seller', 'vendeur', 'help', 'helpful'])) {
            return self::TOPIC_SERVICE;
        }

        if ($this->containsAny($comment, ['utilisation', 'usage', 'easy', 'facile', 'fonctionne', 'works', 'performance'])) {
            return self::TOPIC_USABILITY;
        }

        if ($this->containsAny($comment, ['qualite', 'quality', 'matiere', 'material', 'durable', 'defect', 'defaut', 'cass', 'broken'])) {
            return self::TOPIC_QUALITY;
        }

        return self::TOPIC_GENERAL;
    }

    private function detectPriority(Feedback $feedback, array $sentiment): string
    {
        $note = (int) $feedback->getNote();
        $sentimentLabel = (string) ($sentiment['sentiment'] ?? 'NEUTRE');
        $mood = (string) ($feedback->getAmbiance() ?? '');

        if ($note <= 2 || 'NEGATIF' === $sentimentLabel || in_array($mood, [Feedback::MOOD_ANGRY, Feedback::MOOD_SAD], true) || false === $feedback->isRecommande()) {
            return self::PRIORITY_HIGH;
        }

        if (3 === $note || 'NEUTRE' === $sentimentLabel || Feedback::MOOD_NEUTRAL === $mood) {
            return self::PRIORITY_MEDIUM;
        }

        return self::PRIORITY_LOW;
    }

    private function getTopicBadgeClass(string $topic): string
    {
        return match ($topic) {
            self::TOPIC_DELIVERY => 'bg-dark',
            self::TOPIC_PACKAGING => 'bg-warning text-dark',
            self::TOPIC_PRICE => 'bg-info text-dark',
            self::TOPIC_SERVICE => 'bg-primary',
            self::TOPIC_USABILITY => 'bg-secondary',
            self::TOPIC_QUALITY => 'bg-success',
            default => 'bg-light text-dark border',
        };
    }

    private function getPriorityBadgeClass(string $priority): string
    {
        return match ($priority) {
            self::PRIORITY_HIGH => 'bg-danger',
            self::PRIORITY_MEDIUM => 'bg-warning text-dark',
            default => 'bg-success',
        };
    }

    private function containsAny(string $comment, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            if (str_contains($comment, $keyword)) {
                return true;
            }
        }

        return false;
    }
}
