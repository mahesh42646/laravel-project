<?php

namespace App\Services\Project;

use App\Models\Project\Document;
use DateTime;

final class DocumentService
{
    public function checkStatusExpiredAt(Document $document): bool
    {
        if ($document->expired_at) {
            $now = new DateTime();
            $expiredAt = new DateTime($document->expired_at);

            if ($now > $expiredAt) {
                return true;
            }
        }

        return false;
    }
}
