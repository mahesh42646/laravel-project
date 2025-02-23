<?php

namespace App\Services\Edital;

use App\Enums\Edital\StatusEnum;
use App\Models\Edital\Edital;
use DateTime;

class PeriodService
{
    public function checkExpiration(Edital $edital)
    {
        $today = new DateTime('now');

        if ($edital->extended_at) {
            $extendedAt = new DateTime($edital->extended_at->format('Y-m-d') . ' ' . $edital->horary_extended_at ?: '00:00');

            if ($today > $extendedAt) {
                $edital->update([
                    'status' => StatusEnum::FINISHED
                ]);
            }
        } else {
            $closedAt = new DateTime($edital->closed_at?->format('Y-m-d') . ' ' . $edital->horary_closed_at ?: '00:00');

            if ($today > $closedAt) {
                $edital->update([
                    'status' => StatusEnum::FINISHED
                ]);
            }
        }
    }
}
