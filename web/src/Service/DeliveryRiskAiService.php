<?php

namespace App\Service;

use App\Entity\Livraison;

class DeliveryRiskAiService
{
    public function __construct(private readonly AISentimentService $aiSentimentService)
    {
    }

    public function analyze(Livraison $livraison): array
    {
        $score = 0;
        $reasons = [];
        $note = trim((string) $livraison->getNoteDelivery());
        $noteSentiment = null;

        if (Livraison::STATUS_DELAYED === $livraison->getStatutLivraison()) {
            $score += 4;
            $reasons[] = 'delivery is already marked as delayed';
        }

        $deliveryDate = $livraison->getDateLivraison();
        if (
            Livraison::STATUS_IN_PROGRESS === $livraison->getStatutLivraison()
            && $deliveryDate instanceof \DateTimeInterface
            && $deliveryDate < new \DateTimeImmutable('today')
        ) {
            $score += 2;
            $reasons[] = 'scheduled date has passed while delivery is still in progress';
        }

        if (!$livraison->hasLocation()) {
            ++$score;
            $reasons[] = 'no GPS coordinates are attached yet';
        }

        if ('' !== $note) {
            $noteSentiment = $this->aiSentimentService->analyze($note);
            if ('NEGATIF' === ($noteSentiment['sentiment'] ?? null)) {
                $score += 2;
                $reasons[] = 'AI flagged the delivery note as negative';
            } elseif ('NEUTRE' === ($noteSentiment['sentiment'] ?? null)) {
                ++$score;
                $reasons[] = 'AI flagged the delivery note as neutral or unclear';
            }

            if (preg_match('/delay|retard|problem|blocked|stuck|late|incident/i', $note)) {
                ++$score;
                $reasons[] = 'delivery note mentions a delay or operational issue';
            }
        }

        $level = match (true) {
            $score >= 5 => 'high',
            $score >= 3 => 'medium',
            default => 'low',
        };

        return [
            'level' => $level,
            'label' => match ($level) {
                'high' => 'High risk',
                'medium' => 'Watch closely',
                default => 'Stable',
            },
            'badgeClass' => match ($level) {
                'high' => 'bg-danger',
                'medium' => 'bg-warning text-dark',
                default => 'bg-success',
            },
            'summary' => $reasons[0] ?? 'Delivery looks stable based on the current data.',
            'noteSentiment' => $noteSentiment,
        ];
    }
}
