<?php

namespace App\Services\Project;

use App\Models\Project\Project;
use DateTime;

final class ProponentService
{
    public function checkStatusExpiredAt(Project $project): bool
    {
        if ($project->identification_proponent_status_expired_at) {
            $now = new DateTime();
            $expiredAt = new DateTime($project->identification_proponent_status_expired_at);

            if ($now > $expiredAt) {
                return true;
            }
        }

        return false;
    }
}
