<?php

namespace App\Http\Controllers\Tenant\Setting\Edital;

use App\Enums\Shared\ActiveEnum;
use App\Http\Requests\Tenant\Edital\DocumentTypeRequest;
use App\Models\Edital\DocumentType;
use App\Models\Edital\PeopleType;
use App\Services\Edital\DocumentTypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class DocumentTypeController
{
    public function __construct(
        private readonly DocumentTypeService $service
    ) {}

    public function index(): View
    {
        return view('tenant.settings.edital.index', [
            'total' => $this->service->getTotal(),
            'documents' => $this->service->getAll(),
            'documentTypes' => PeopleType::active()->get(),
            'statuses' => ActiveEnum::cases(),
        ]);
    }

    public function store(DocumentTypeRequest $request): RedirectResponse
    {
        DocumentType::create($request->payload());

        return redirect()
            ->route('editals.documents.types.index')
            ->withSuccess($request->message());
    }

    public function update(DocumentType $document, DocumentTypeRequest $request): RedirectResponse
    {
        $document->update($request->payload());

        return redirect()
            ->route('editals.documents.types.index')
            ->withSuccess($request->message());
    }
}
