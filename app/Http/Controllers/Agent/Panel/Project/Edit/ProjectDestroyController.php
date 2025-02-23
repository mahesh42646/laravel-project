<?php

namespace App\Http\Controllers\Agent\Panel\Project\Edit;

use App\Http\Controllers\Controller;
use App\Models\Project\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

final class ProjectDestroyController extends Controller
{
    public function destroy(string $token, string $projectCode): RedirectResponse
    {
        DB::beginTransaction();
            $project = Project::find(base64_decode($projectCode));

            foreach ($project->diligences as $diligence) {
                foreach ($diligence->messages as $message) {
                    $message->documents()->delete();
                }

                $diligence->messages()->delete();
            }

            $project->inscription_accessibilities()->sync([]);
            $project->inscription_accessibility_arquitetonics()->sync([]);
            $project->inscription_accessibility_communicationals()->sync([]);
            $project->inscription_accessibility_atitudinals()->sync([]);
            $project->inscription_strategies()->sync([]);

            $project->diligences()->delete();
            $project->files()->delete();
            $project->delete();
        DB::commit();

        return redirect()
            ->route('public.panel.home.index', $token)
            ->withSuccess('Projeto <strong>deletado</strong> com sucesso!');
    }
}
