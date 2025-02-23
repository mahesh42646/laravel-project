<?php

namespace App\Services\Project;

use App\Models\Project\Project;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use ZipArchive;

final class DownloadService
{
    public function removeOldZipFiles(): void
    {
        $fileSystem = new Filesystem();
        $files = $fileSystem->files(public_path());

        foreach ($files as $file) {
            $isZipValid = str_starts_with($file->getFilename(), 'arquivos-download');

            if ($isZipValid) {
                unlink($file->getPathName());
            }
        }
    }

    public function zip(Project $project): mixed
    {
        $zipFile = 'arquivos-download-' . date('d_m_Y__H_i_s') . '-' . Str::random(4) . '.zip';
        $zip = new ZipArchive();
        $zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach ($project->files as $file) {
            // WINDOWNS \caminho\   LINUX /caminho/
           
            if (DIRECTORY_SEPARATOR == '\\') {
                $path = str_replace('/', '\\', $file->path);
                $filePath = storage_path("app\\{$path}");
            } else {
                $filePath = storage_path("app/{$file->path}");
            }

            if (file_exists($filePath) && is_file($filePath)) {
                $fileName = Str::slug($file->document?->name);
                $zip->addFile($filePath, "{$fileName}.pdf");
            }
        }

        $zip->close();

        return $zipFile;
    }

    public function getHTMLByProponent(Project $project): string
    {
        $edital = $project->edital->name;
        $customer = $project->customer;
        $type = $project->type_people == 'PF' ? 'Pessoa Física' : 'Pessoa Jurídica';
        $cnpj = $project->type_people == 'PJ' ? "<strong>Empresa:</strong> {$project->customer_company_name}<br><strong>CNPJ:</strong> {$project->customer_cnpj}<br>" : '';
        $socialName = $customer->name_social ?: 'Não informado';
        $areaAtuationOther = $customer->area_atuation_other ?: '-';
        $communityTraditional = $customer->community_traditional_id?->getName() ?: '-';
        $generatedAt = date('d/m/Y H:i');
        
        return <<<HTML
            <br>
            <div style="text-align: center; background-color: #e2e9f1;"><strong>{$edital}</strong></div>
            <div style="text-align: center"><strong>DADOS DO PROPONENTE</strong></div>
            <hr>

            <div><strong>Nome:</strong> {$customer->name}<br><strong>Tipo:</strong> {$type}<br>{$cnpj}<strong>CPF:</strong> {$customer->cpf}<br><strong>RG:</strong> {$customer->rg}<br><strong>Gênero:</strong> {$customer->gender_id?->getName()}<br><strong>Nome Social:</strong> {$socialName}<br><strong>Raça:</strong> {$customer->breed_id?->getName()}<br><strong>Você é LGBTQIAPN+?:</strong> {$customer->is_lgbt?->getName()}<br><strong>Escolaridade:</strong> {$customer->schooling_id?->getName()}<br><strong>Renda Individual:</strong> {$customer->income_masked}</div>
            <hr>
            <div><strong>Principal área de Atuação:</strong> {$customer->area_atuation_id?->getName()}<br><strong>Outras Áreas de Atuação:</strong> {$areaAtuationOther}<br><strong>Comunidades Tradicionais:</strong> {$communityTraditional}</div>
            <hr>
            <div><strong>Cidade:</strong> {$customer->city}<br><strong>Endereço:</strong> {$customer->address}<br><strong>Telefone:</strong> {$customer->phone}<br><strong>E-mail:</strong> {$customer->email}</div>
            <hr>
            <div style="text-align: center"><strong>Documento gerado em:</strong></div>
            <span style="text-align: center">{$generatedAt}</span>
        HTML;
    }

    public function getHTMLByProject(Project $project): string
    {
        $edital = $project->edital->name;
        $customer = $project->customer;
        $type = $customer->type == 'PF' ? 'Pessoa Física' : 'Pessoa Jurídica';
        $cnpj = $customer->type == 'PJ' ? "<strong>Empresa:</strong> {$project->customer_company_name}<br><strong>CNPJ:</strong> {$project->customer_cnpj}<br>" : '';
        
        $resume = $project->resume ? "<div><strong>Resumo da proposta:</strong> {$project->resume}</div>" : '';
        $description = $project->description ? "<div><strong>Descrição da proposta:</strong> {$project->description}</div>" : '';
        $objectives = $project->objectives ? "<div><strong>Objetivos e metas:</strong> {$project->objectives}</div>" : '';
        $justification = $project->justification ? "<div><strong>Justificativa:</strong> {$project->justification}</div>" : '';
        $target = $project->target ? "<div><strong>Público-alvo:</strong> {$project->target}</div>" : '';
        $cronogram = $project->cronogram ? "<div><strong>Cronograma de execução:</strong> {$project->cronogram}</div>" : '';
        $accessibility = $project->accessibility ? "<div><strong>Medidas de acessiblidade:</strong> {$project->accessibility}</div>" : '';
        $plan = $project->plan ? "<div><strong>Plano de divulgação:</strong> {$project->plan}</div>" : '';
        $contraPartidSocial = $project->contra_partid_social ? "<div><strong>Contrapartida social:</strong> {$project->contra_partid_social}</div>" : '';
        $locals = $project->locals ? "<div><strong>Locais previstos para realização da ação cultural:</strong> {$project->locals}</div>" : '';
        $generatedAt = date('d/m/Y H:i');
        
        return <<<HTML
            <br>
            <div style="text-align: center; background-color: #e2e9f1;"><strong>{$edital}</strong></div>
            <div style="text-align: center"><strong>DADOS BÁSICOS DO PROPONENTE</strong></div>
            <div><strong>Nome:</strong> {$customer->name}<br><strong>Tipo:</strong> {$type}<br>{$cnpj}<strong>CPF:</strong> {$customer->cpf}<br><strong>Principal área de Atuação:</strong> {$customer->area_atuation}</div>
            <hr>
            <br>
            <div style="text-align: center"><strong>DADOS DO PROJETO</strong></div>
            <div><strong>Nome:</strong> {$project->name}<br><strong>Valor:</strong> {$project->price_masked}<strong></div>

            {$resume}
            {$description}
            {$objectives}
            {$justification}
            {$target}
            {$cronogram}
            {$accessibility}
            {$plan}
            {$contraPartidSocial}
            {$locals}

            <hr>
            <div style="text-align: center"><strong>Documento gerado em:</strong></div>
            <span style="text-align: center">{$generatedAt}</span>
        HTML;
    }

    public function getHTMLByProjectPanelCustomer(Project $project): string
    {
        $edital = $project->edital->name;
        $customer = $project->customer;
        $type = $customer->type == 'PF' ? 'Pessoa Física' : 'Pessoa Jurídica';
        $cnpj = $customer->type == 'PJ' ? "<strong>Empresa:</strong> {$project->customer_company_name}<br><strong>CNPJ:</strong> {$project->customer_cnpj}<br>" : '';
        $socialName = $customer->name_social ?: 'Não informado';
        $areaAtuationOther = $customer->area_atuation_other ?: '-';
        $communityTraditional = $customer->community_traditional_id?->getName() ?: '-';

        $situation = $project->status?->getName();
        $note = $project->note ? "<strong>Nota:</strong> {$project->note}" : '';
        $resume = $project->resume ? "<div><strong>Resumo da proposta:</strong> {$project->resume}</div>" : '';
        $description = $project->description ? "<div><strong>Descrição da proposta:</strong> {$project->description}</div>" : '';
        $objectives = $project->objectives ? "<div><strong>Objetivos e metas:</strong> {$project->objectives}</div>" : '';
        $justification = $project->justification ? "<div><strong>Justificativa:</strong> {$project->justification}</div>" : '';
        $target = $project->target ? "<div><strong>Público-alvo:</strong> {$project->target}</div>" : '';
        $cronogram = $project->cronogram ? "<div><strong>Cronograma de execução:</strong> {$project->cronogram}</div>" : '';
        $accessibility = $project->accessibility ? "<div><strong>Medidas de acessiblidade:</strong> {$project->accessibility}</div>" : '';
        $plan = $project->plan ? "<div><strong>Plano de divulgação:</strong> {$project->plan}</div>" : '';
        $contraPartidSocial = $project->contra_partid_social ? "<div><strong>Contrapartida social:</strong> {$project->contra_partid_social}</div>" : '';
        $locals = $project->locals ? "<div><strong>Locais previstos para realização da ação cultural:</strong> {$project->locals}</div>" : '';
        $generatedAt = date('d/m/Y H:i');
        
        return <<<HTML
            <br>
            <div style="text-align: center; background-color: #e2e9f1;"><strong>{$edital}</strong></div>
            <div style="text-align: center"><strong>MEUS DADOS</strong></div>
            <div><strong>Nome:</strong> {$customer->name}<br><strong>Tipo:</strong> {$type}<br>{$cnpj}<strong>CPF:</strong> {$customer->cpf}<br><strong>RG:</strong> {$customer->rg}<br><strong>Gênero:</strong> {$customer->gender_id?->getName()}<br><strong>Nome Social:</strong> {$socialName}<br><strong>Raça:</strong> {$customer->breed_id?->getName()}<br><strong>Você é LGBTQIAPN+?:</strong> {$customer->is_lgbt?->getName()}<br><strong>Escolaridade:</strong> {$customer->schooling_id?->getName()}<br><strong>Renda Individual:</strong> {$customer->income_masked}</div>
            <hr>
            <div><strong>Principal área de Atuação:</strong> {$customer->area_atuation_id?->getName()}<br><strong>Outras Áreas de Atuação:</strong> {$areaAtuationOther}<br><strong>Comunidades Tradicionais:</strong> {$communityTraditional}</div>
            <hr>
            <div><strong>Cidade:</strong> {$customer->city}<br><strong>Endereço:</strong> {$customer->address}<br><strong>Telefone:</strong> {$customer->phone}<br><strong>E-mail:</strong> {$customer->email}</div>
            <hr>
            <br>
            <div style="text-align: center"><strong>DADOS DO MEU PROJETO</strong></div>
            <div><strong>Nome:</strong> {$project->name}<br><strong>Valor:</strong> {$project->price_masked}<br><strong>Situação:</strong> {$situation}<br>{$note}</div>

            {$resume}
            {$description}
            {$objectives}
            {$justification}
            {$target}
            {$cronogram}
            {$accessibility}
            {$plan}
            {$contraPartidSocial}
            {$locals}

            <hr>
            <div style="text-align: center"><strong>Documento gerado em:</strong></div>
            <span style="text-align: center">{$generatedAt}</span>
        HTML;
    }
}
