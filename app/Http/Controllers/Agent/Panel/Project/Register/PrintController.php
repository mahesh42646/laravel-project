<?php

namespace App\Http\Controllers\Agent\Panel\Project\Register;

use App\Http\Controllers\Controller;
use App\Models\Project\Project;
use App\Services\Agent\InscriptionComprovantService;
use App\Traits\Pdf\ConfigPdf;
use App\Traits\Pdf\HeaderPdf;
use Elibyy\TCPDF\Facades\TCPDF;

final class PrintController extends Controller
{
    use HeaderPdf, ConfigPdf;

    public function __construct(
        private readonly InscriptionComprovantService $service
    ) {}

    public function print(string $token, string $projectCode): void
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        $this->config();

        $tenant = $project->tenant;
        $title = 'COMPROVANTE DE INSCRIÇÃO';
        $this->header($tenant->name, $tenant->company->name, $title);

        $pdf = new TCPDF();
        $pdf::AddPage();
        $pdf::writeHTML($this->service->getContent($project), true, false, true, false, '');
        $pdf::Output('comprovante-de-inscricao.pdf', 'I');
    }

    public function download(string $token, string $projectCode): void
    {
        $project = Project::findOrFail(base64_decode($projectCode));
        $this->config();

        $tenant = $project->tenant;
        $title = 'COMPROVANTE DE INSCRIÇÃO';
        $this->header($tenant->name, $tenant->company->name, $title);

        $pdf = new TCPDF();
        $pdf::AddPage();
        $pdf::writeHTML($this->service->getContent($project), true, false, true, false, '');
        $pdf::Output('comprovante-de-inscricao.pdf', 'D');
    }
}
