<?php

namespace App\Http\Requests\Public\Project\Register;

use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Enums\Project\DocumentStatusEnum;
use App\Models\Project\AnalyzeDocument\Document;
use App\Models\Project\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class DocumentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
            'file' => ['required', File::types('pdf')->max('5mb')],
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'Selecione o arquivo a ser carregado!',
            'file.file' => 'Selecione o arquivo a ser carregado!',
            'file.mimes' => 'O arquivo a ser carregado deve ser do tipo PDF!',
            'file.max' => 'O arquivo a ser carregado não pode ser superior a 5 MB!',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => '<strong>código do arquivo</strong>',
            'file' => '<strong>arquivo</strong>',
        ];
    }

    public function upload(): void
    {
        $documentModel = Document::find($this->id);
        $project = $documentModel->project;

        if ($documentModel->path) {
            $diskLocal = Storage::disk('local');
 
            if ($diskLocal->exists($documentModel->path)) {
                $diskLocal->delete($documentModel->path);
            }

            $documentModel->timelines()->create([
                'status' => TimelineStatusEnum::UPDATED,
                'customer_id' => $this->customer_id,
            ]);
        } else {
            $documentModel->timelines()->create([
                'status' => TimelineStatusEnum::SENT,
                'customer_id' => $this->customer_id,
            ]);
        }

        $this->saveFile($project, $documentModel);
    }

    private function saveFile(Project $project, Document $documentModel): void
    {
        $document = $this->file;
        $year = date('Y');
        $tenantId = session('tenant_id');

        $filePath = $document->storeAs(
            path: "tenants/{$tenantId}/{$year}/projects/{$project->id}",
            name: Str::random(32).'.'.$document->extension(), 
            options: 'local',
        );

        $documentModel->update([
            'path' => $filePath,
            'status' => DocumentStatusEnum::SENT,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // DB::table('project_documents')
        //     ->where('id', $this->id)
        //     ->update([
        //         'path' => $filePath,
        //         'status' => DocumentStatusEnum::SENT->value,
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ]);
    }

    public function message(): string
    {
        return "Arquivo <strong>salvo</strong> com sucesso!";
    }
}
