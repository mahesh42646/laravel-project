<?php

namespace App\Http\Controllers\Agent\Panel\Project;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Notification\Notification;
use App\Models\Project\Project;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(string $token, string $projectCode): View
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        Notification::where('project_id', $project->id)
            ->where('to_customer_id', $project->customer_id)
            ->whereNull('readed_at')
            ->update(['readed_at' => date('Y-m-d H:i:s')]);

        $notifications = Notification::where('project_id', $project->id)
            ->where('to_customer_id', $project->customer_id)
            ->orderByDesc('id')
            ->get();
            
        return view('public.panel.project.notification', [
            'customer' => Customer::find($project->customer_id),
            'notifications' => $notifications,
            'project' => $project,
            'token' => $token,
        ]);
    }
}
