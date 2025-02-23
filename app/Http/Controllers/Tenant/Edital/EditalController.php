<?php

namespace App\Http\Controllers\Tenant\Edital;

use App\Enums\Edital\RegisterTypeEnum;
use App\Enums\Edital\StatusEnum;
use App\Enums\Edital\TypeEnum;
use App\Http\Requests\Tenant\Edital\EditalRequest;
use App\Models\Edital\Attachment;
use App\Models\Edital\DocumentType;
use App\Models\Edital\Edital;
use App\Models\Edital\Identification;
use App\Models\Edital\PeopleType;
use App\Models\Edital\Quota;
use App\Services\Edital\EditalService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

final class EditalController
{
    public function __construct(
        private readonly EditalService $service
    ) {}

    public function index(): View
    {
        return view('tenant.editals.index', [
            'total' => $this->service->getTotal(),
            'editals' => $this->service->getAll(),
        ]);
    }

    public function create(): View
    {
        return view('tenant.editals.create', [
            'types' => TypeEnum::cases(),
            'peopleTypes' => PeopleType::active()->get(),
            'quotas' => Quota::active()->get(),
            'registerTypes' => RegisterTypeEnum::cases(),
            'documentTypes' => DocumentType::getAll(),
            'identifications' => Identification::active()->get(),
        ]);
    }

    public function store(EditalRequest $request): RedirectResponse
    {
        DB::beginTransaction();
            $edital = Edital::create($request->payload());
            $edital->quotas()->sync($request->quotas);
            $edital->peoples_types()->sync($request->people_types);

            $this->service->saveImages($request, $edital);
            $this->service->saveAttachmentsPDF($request, $edital);
            $this->service->saveDocumentations($request, $edital);
            $this->service->saveIdentificationFields($request, $edital);
        DB::commit();

        return redirect()
            ->route('editals.index')
            ->withSuccess($request->message());
    }

    public function edit(Edital $edital): View
    {
        return view('tenant.editals.edit', [
            'edital' => $edital,
            'types' => TypeEnum::cases(),
            'peopleTypes' => PeopleType::active()->get(),
            'quotas' => Quota::active()->get(),
            'registerTypes' => RegisterTypeEnum::cases(),
            'documentTypes' => DocumentType::getAll(),
            'documentNames' => DocumentType::getNameAll($edital),
            'statuses' => StatusEnum::cases(),
            'identifications' => Identification::active()->get(),
            'editalIdentifications' => $this->service->getFieldIdentifications($edital),
        ]);
    }

    public function update(EditalRequest $request, Edital $edital): RedirectResponse
    {
        DB::beginTransaction();
            $edital->update($request->payload());
            $edital->quotas()->sync($request->quotas);
            $edital->peoples_types()->sync($request->people_types);
            
            $this->service->saveImages($request, $edital);
            $this->service->saveAttachmentsPDF($request, $edital);
            $this->service->updateDocumentations($request, $edital);
            $this->service->updateIdentificationFields($request, $edital);
        DB::commit();

        return redirect()
            ->route('editals.edit', $edital->id)
            ->withSuccess($request->message());
    }

    public function destroy(Edital $edital): RedirectResponse
    {
        $project = DB::select(
            "SELECT COUNT(id) AS total 
            FROM projects
            WHERE projects.edital_id = ? AND tenant_id = ?
            LIMIT 1", [$edital->id, session('tenant_id')]
        )[0];

        if ($project->total > 0) {
            return redirect()
                ->route('editals.index')
                ->withErrors('O edital selecionado não pode ser excluído! Pois existem projetos associados a este edital!');
        }

        $this->service->delete($edital);

        return redirect()
            ->route('editals.index')
            ->withSuccess('Edital deletado com sucesso!');
    }

    public function destroyAttachment(Edital $edital, Attachment $attachment): RedirectResponse
    {
        Storage::delete($attachment->path);
        $attachment->delete();

        return redirect()
            ->route('editals.edit', $edital->id)
            ->withSuccess("Anexo <strong>excluído</strong> com sucesso!");
    }

    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'editals' => $this->service->search($request->name)
        ]);
    }
}
