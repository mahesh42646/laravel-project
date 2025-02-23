<?php

namespace App\Http\Controllers\Tenant\Project\Analyze;

use App\Enums\Project\StatusEnum;
use App\Enums\Shared\BooleanEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Tabs\NotetRequest;
use App\Models\Project\Project;
use Illuminate\Http\RedirectResponse;

final class NoteController extends Controller
{
    public function update(Project $project, NotetRequest $request): RedirectResponse
    {
        $project->update([
            'note' => $request->note
        ]);

        return redirect()->route('projects.edit', $project->id);
    }

    public function selectProject(Project $project): RedirectResponse
    {
        $project->update([
            'is_selected' => BooleanEnum::YES,
            'is_substitute' => BooleanEnum::NOT,
            'status' => StatusEnum::SELECTED,
        ]);

        return redirect()->route('projects.edit', $project->id);
    }

    public function enableProject(Project $project): RedirectResponse
    {
        $project->update([
            'is_enabled' => BooleanEnum::YES,
            'status' => StatusEnum::ENABLED,
        ]);

        return redirect()->route('projects.edit', $project->id);
    }

    public function disableProject(Project $project): RedirectResponse
    {
        $project->update([
            'is_enabled' => BooleanEnum::NOT,
            'status' => StatusEnum::REPPROVED,
        ]);

        return redirect()->route('projects.edit', $project->id);
    }

    public function substituteProject(Project $project): RedirectResponse
    {
        $project->update([
            'is_substitute' => BooleanEnum::YES,
            'status' => StatusEnum::SUBSTITUTE,
        ]);

        return redirect()->route('projects.edit', $project->id);
    }
}
