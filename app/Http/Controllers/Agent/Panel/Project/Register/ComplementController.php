<?php

namespace App\Http\Controllers\Agent\Panel\Project\Register;

use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Enums\Project\SubscribeStatusEnum;
use App\Enums\Shared\SocialMediaEnum;
use App\Http\Controllers\Controller;
use App\Models\Project\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class ComplementController extends Controller
{
    public function create(string $token, string $projectCode): View
    {
        $project = Project::findOrFail(base64_decode($projectCode));

        return view('public.panel.project.register.complements.create', [
            'project' => $project,
            'edital' => $project->edital,
            'token' => $token,
            'projectCode' => $projectCode,
            'socialMedias' => SocialMediaEnum::cases()
        ]);
    }

    public function store(string $token, string $projectCode, Request $request): RedirectResponse
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        $customer = session("customer_auth_{$request['customer_id']}");
        $payload = [];

        foreach ((array) $request->ids as $index => $mediaId) {
            $payload[] = [
                'media_id' => $mediaId,
                'link' => $request->links[$index],
                'description' => $request->descriptions[$index],
                'customer_id' => $customer->id,
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        DB::beginTransaction();
            DB::table('customer_social_medias')->insert($payload);
            $project->update([
                'subscribe_status' => SubscribeStatusEnum::APPROVED,
                'sended_at' => date('Y-m-d H:i:s'),
            ]);

            $analyzeComplement = $project->analyze_complement()->create([
                'status' => AnalyzeStatusEnum::PENDING,
                'customer_id' => $project->customer_id,
            ]);
    
            $analyzeComplement->timelines()->create([
                'status' => TimelineStatusEnum::SENT,
                'customer_id' => $project->customer_id,
            ]);
        DB::commit();
        
        return redirect()
            ->route('public.panel.project.register.complements.success', [
                'token' => $token,
                'projectCode' => $projectCode,
            ]);
    }

    public function success(string $token, string $projectCode, Request $request): View
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        $customer = session("customer_auth_{$request['customer_id']}");

        return view('public.panel.project.register.success', [
            'project' => $project,
            'edital' => $project->edital,
            'token' => $token,
            'projectCode' => $projectCode,
            'customer' => $customer,
            'socialMedias' => SocialMediaEnum::cases()
        ]);
    }
}
