<?php

namespace App\Http\Controllers\Agent\Panel\Project\Edit;

use App\Enums\Shared\SocialMediaEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\Project\Edit\ComplementRequest;
use App\Models\Customer\SocialMedia;
use App\Models\Project\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class ComplementController extends Controller
{
    public function edit(string $token, string $projectCode, Request $request): View
    {
        $project = Project::findOrFail(base64_decode($projectCode));

        return view('public.panel.project.view.complements.edit', [
            'project' => $project,
            'customer' => session("customer_auth_{$request['customer_id']}"),
            'edital' => $project->edital,
            'token' => $token,
            'projectCode' => $projectCode,
            'socialMedias' => SocialMediaEnum::cases()
        ]);
    }

    public function store(string $token, string $projectCode, ComplementRequest $request): JsonResponse
    {
        DB::beginTransaction();
            $project = Project::findOrFail(base64_decode($projectCode));
            $project->update(['updated_at' => date('Y-m-d H:i:s')]);
            $socialMedia = SocialMedia::create($request->payload());
            $request->updateSessionFromUserAuthenticated();
        DB::commit();

        return response()->json([
            'message' => $request->message(),
            'link' => $socialMedia->link,
            'description' => $socialMedia->description,
            'routeDestroy' => route('public.panel.project.view.complements.destroy', [
                $token, $projectCode, $socialMedia->id
            ]),
        ]);
    }

    public function destroy(string $token, string $projectCode, string $id, ComplementRequest $request): RedirectResponse
    {
        SocialMedia::findOrFail($id)->delete();
        $request->updateSessionFromUserAuthenticated();

        return redirect()
            ->route('public.panel.project.view.complements.edit', [$token, $projectCode])
            ->withSuccess($request->message());
    }
}
