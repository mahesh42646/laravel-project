<?php

namespace App\Services\Project;

use App\Models\Project\Diligence\Diligence;
use DateTime;

final class DiligenceService
{
    public function checkStatusExpiredAt(Diligence $diligence): bool
    {
        if ($diligence->expired_at) {
            $now = new DateTime();
            $expiredAt = new DateTime($diligence->expired_at);

            if ($now > $expiredAt) {
                return true;
            }
        }

        return false;
    }
}
