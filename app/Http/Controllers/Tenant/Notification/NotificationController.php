<?php

namespace App\Http\Controllers\Tenant\Notification;

use App\Models\Notification\NotificationProfessional;
use Illuminate\View\View;

final class NotificationController
{
    public function index(): View
    {   
        // NotificationProfessional::where('to_professional_id', auth()->id())
        //     ->whereNull('readed_at')
        //     ->update(['readed_at' => date('Y-m-d H:i:s')]);

        // return view('tenant.notifications.index', [
        //     'alerts' => NotificationProfessional::alerts()
        // ]);

        return view('tenant.notifications.index', [
            
        ]);
    }

    public function show(NotificationProfessional $notification): View
    {
        $notification->update([
            'readed_at' => date('Y-m-d H:i:s')
        ]);

        return view('tenant.notifications.show', [
            'notification' => $notification
        ]);
    }
}
