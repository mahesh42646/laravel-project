<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Services\SuperAdmin\ArtistService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ArtistController extends Controller
{
    public function __construct(
        private readonly ArtistService $service
    ) {}

    public function index(): View
    {
        return view('super-admin.dash.artists.index', [
            'artists' => $this->service->getAll(),
        ]);
    }

    public function destroy(Customer $artist): RedirectResponse
    {
        DB::beginTransaction();
            foreach ($artist->projects as $project) {
                foreach ($project->diligences as $diligence) {
                    foreach ($diligence->messages as $message) {
                        $message->documents()->delete();
                    }

                    $diligence->messages()->delete();
                }

                $project->diligences()->delete();
                $project->files()->delete();
            }

            $artist->projects()->delete();
            $artist->social_medias()->delete();
            $artist->notifications()->delete();
            $artist->notification_professionals()->delete();
            $artist->delete();
        DB::commit();

        return redirect()
            ->route('dash.artists.index')
            ->withSuccess('Artista <strong>excluído</strong> com sucesso!');
    }

    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'artists' => $this->service->search($request->name)
        ]);
    }
}
