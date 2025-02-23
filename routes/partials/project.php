<?php

use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\Project\AnalyzeController;
use App\Http\Controllers\Tenant\Project\ProjectController;
use App\Http\Controllers\Tenant\Project\SearchController;
use App\Http\Controllers\Tenant\Project\Analyze\ProponentComplementController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProponentController;
use App\Http\Controllers\Tenant\Project\Analyze\ProponentDocumentController;
use App\Http\Controllers\Project\Analyze\ProponentDiligenceController;
use App\Http\Controllers\Tenant\Project\Analyze\FileTimelineController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectAccessibilityController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectContrapartidSocialController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectCronogramController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectDescriptionController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectJustificationController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectLocalController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectNameController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectObjectiveController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectPlanController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectPriceController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectResumeController;
use App\Http\Controllers\Tenant\Project\Analyze\IdentificationProject\IdentificationProjectTargetController;
use App\Http\Controllers\Tenant\Project\Analyze\InscriptionProjectController;
use App\Http\Controllers\Tenant\Project\Analyze\NoteController;

Route::post('projects/search-all', [SearchController::class, 'search'])->name('projects.search.all');
Route::get('projects/search-customer-cpf', [ProjectController::class, 'searchCustomerByCpf'])->name('projects.search.customer.cpf');
Route::get('projects/search-customer-cnpj', [ProjectController::class, 'searchCustomerByCnpj'])->name('projects.search.customer.cnpj');
Route::get('projects/search-file', [ProjectController::class, 'searchFile'])->name('projects.search.file');
Route::resource('projects', ProjectController::class)->except(['index', 'show']);

// BUSCAR
Route::name('projects.search.')
->controller(SearchController::class)
->group(function () {
    Route::get('projects/search/', 'index')->name('index');
    Route::get('projects/search/execute', 'search')->name('execute');
});

Route::put('projects/{project}/identification-proponent/repproved', [IdentificationProponentController::class, 'repproved'])->name('projects.tabs.customer.repproved');
Route::put('projects/{project}/identification-proponent/reanalyze', [IdentificationProponentController::class, 'reanalyze'])->name('projects.tabs.customer.reanalyze');
Route::get('projects/{project}/identification-proponent/approved', [IdentificationProponentController::class, 'approved'])->name('projects.tabs.customer.approved');
Route::get('projects/{project}/identification-proponent/print', [IdentificationProponentController::class, 'print'])->name('projects.tabs.customer.print');

Route::put('projects/{project}/inscription-project/repproved', [InscriptionProjectController::class, 'repproved'])->name('projects.tabs.inscription.project.repproved');
Route::put('projects/{project}/inscription-project/reanalyze', [InscriptionProjectController::class, 'reanalyze'])->name('projects.tabs.inscription.project.reanalyze');
Route::get('projects/{project}/inscription-project/approved', [InscriptionProjectController::class, 'approved'])->name('projects.tabs.inscription.project.approved');
Route::get('projects/{project}/inscription-project/print', [InscriptionProjectController::class, 'print'])->name('projects.tabs.inscription.project.print');

Route::put('projects/{project}/identification-project/repproved', [IdentificationProjectController::class, 'repproved'])->name('projects.tabs.identification.project.repproved');
Route::put('projects/{project}/identification-project/reanalyze', [IdentificationProjectController::class, 'reanalyze'])->name('projects.tabs.identification.project.reanalyze');
Route::get('projects/{project}/identification-project/approved', [IdentificationProjectController::class, 'approved'])->name('projects.tabs.identification.project.approved');
Route::get('projects/{project}/identification-project/print', [IdentificationProjectController::class, 'print'])->name('projects.tabs.identification.project.print');

// ANALISAR DOCUMENTOS GERAL DO PROJETO
Route::put('projects/{project}/documents/repproved', [ProponentDocumentController::class, 'repproved'])->name('projects.tabs.document.repproved');
Route::get('projects/{project}/documents/approved', [ProponentDocumentController::class, 'approved'])->name('projects.tabs.document.approved');
Route::put('projects/{project}/documents/reanalyze', [ProponentDocumentController::class, 'reanalyze'])->name('projects.tabs.document.reanalyze');
Route::get('projects/{project}/documents/download', [ProponentDocumentController::class, 'download'])->name('projects.tabs.document.download');

// ANALISAR DOCUMENTOS DA TIMELINE DO PROJETO
Route::get('projects/{project}/files/{file}/approved', [FileTimelineController::class, 'approved'])->name('projects.tabs.document.timeline.approved');
Route::get('projects/{project}/files/{file}/repproved', [FileTimelineController::class, 'repproved'])->name('projects.tabs.document.timeline.repproved');
Route::get('projects/{project}/files/{file}/reanalyze', [FileTimelineController::class, 'reanalyze'])->name('projects.tabs.document.timeline.reanalyze');

// ANALISAR CATEGORIA DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-category/repproved', [IdentificationProjectCategoryController::class, 'repproved'])->name('projects.analyze.identification.project.category.repproved');
Route::get('/{project}/identification-project-category/reanalyze', [IdentificationProjectCategoryController::class, 'reanalyze'])->name('projects.analyze.identification.project.category.reanalyze');
Route::get('/{project}/identification-project-category/approved', [IdentificationProjectCategoryController::class, 'approved'])->name('projects.analyze.identification.project.category.approved');

// ANALISAR NOME DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-name/repproved', [IdentificationProjectNameController::class, 'repproved'])->name('projects.analyze.identification.project.name.repproved');
Route::get('/{project}/identification-project-name/reanalyze', [IdentificationProjectNameController::class, 'reanalyze'])->name('projects.analyze.identification.project.name.reanalyze');
Route::get('/{project}/identification-project-name/approved', [IdentificationProjectNameController::class, 'approved'])->name('projects.analyze.identification.project.name.approved');

// ANALISAR PRECO DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-price/repproved', [IdentificationProjectPriceController::class, 'repproved'])->name('projects.analyze.identification.project.price.repproved');
Route::get('/{project}/identification-project-price/reanalyze', [IdentificationProjectPriceController::class, 'reanalyze'])->name('projects.analyze.identification.project.price.reanalyze');
Route::get('/{project}/identification-project-price/approved', [IdentificationProjectPriceController::class, 'approved'])->name('projects.analyze.identification.project.price.approved');

// ANALISAR RESUMO DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-resume/repproved', [IdentificationProjectResumeController::class, 'repproved'])->name('projects.analyze.identification.project.resume.repproved');
Route::get('/{project}/identification-project-resume/reanalyze', [IdentificationProjectResumeController::class, 'reanalyze'])->name('projects.analyze.identification.project.resume.reanalyze');
Route::get('/{project}/identification-project-resume/approved', [IdentificationProjectResumeController::class, 'approved'])->name('projects.analyze.identification.project.resume.approved');

// ANALISAR DESCRICAO DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-description/repproved', [IdentificationProjectDescriptionController::class, 'repproved'])->name('projects.analyze.identification.project.description.repproved');
Route::get('/{project}/identification-project-description/reanalyze', [IdentificationProjectDescriptionController::class, 'reanalyze'])->name('projects.analyze.identification.project.description.reanalyze');
Route::get('/{project}/identification-project-description/approved', [IdentificationProjectDescriptionController::class, 'approved'])->name('projects.analyze.identification.project.description.approved');

// ANALISAR OBJETIVOS E METAS DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-objective/repproved', [IdentificationProjectObjectiveController::class, 'repproved'])->name('projects.analyze.identification.project.objective.repproved');
Route::get('/{project}/identification-project-objective/reanalyze', [IdentificationProjectObjectiveController::class, 'reanalyze'])->name('projects.analyze.identification.project.objective.reanalyze');
Route::get('/{project}/identification-project-objective/approved', [IdentificationProjectObjectiveController::class, 'approved'])->name('projects.analyze.identification.project.objective.approved');

// ANALISAR JUSTIFICATIVA DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-justification/repproved', [IdentificationProjectJustificationController::class, 'repproved'])->name('projects.analyze.identification.project.justification.repproved');
Route::get('/{project}/identification-project-justification/reanalyze', [IdentificationProjectJustificationController::class, 'reanalyze'])->name('projects.analyze.identification.project.justification.reanalyze');
Route::get('/{project}/identification-project-justification/approved', [IdentificationProjectJustificationController::class, 'approved'])->name('projects.analyze.identification.project.justification.approved');

// ANALISAR PUBLICO ALVO DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-target/repproved', [IdentificationProjectTargetController::class, 'repproved'])->name('projects.analyze.identification.project.target.repproved');
Route::get('/{project}/identification-project-target/reanalyze', [IdentificationProjectTargetController::class, 'reanalyze'])->name('projects.analyze.identification.project.target.reanalyze');
Route::get('/{project}/identification-project-target/approved', [IdentificationProjectTargetController::class, 'approved'])->name('projects.analyze.identification.project.target.approved');

// ANALISAR CRONOGRAMA DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-cronogram/repproved', [IdentificationProjectCronogramController::class, 'repproved'])->name('projects.analyze.identification.project.cronogram.repproved');
Route::get('/{project}/identification-project-cronogram/reanalyze', [IdentificationProjectCronogramController::class, 'reanalyze'])->name('projects.analyze.identification.project.cronogram.reanalyze');
Route::get('/{project}/identification-project-cronogram/approved', [IdentificationProjectCronogramController::class, 'approved'])->name('projects.analyze.identification.project.cronogram.approved');

// ANALISAR MEDIDAS DE ACESSIBILIDADE DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-accessibility/repproved', [IdentificationProjectAccessibilityController::class, 'repproved'])->name('projects.analyze.identification.project.accessibility.repproved');
Route::get('/{project}/identification-project-accessibility/reanalyze', [IdentificationProjectAccessibilityController::class, 'reanalyze'])->name('projects.analyze.identification.project.accessibility.reanalyze');
Route::get('/{project}/identification-project-accessibility/approved', [IdentificationProjectAccessibilityController::class, 'approved'])->name('projects.analyze.identification.project.accessibility.approved');

// ANALISAR PLANO DE DIVULGACAO DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-plan/repproved', [IdentificationProjectPlanController::class, 'repproved'])->name('projects.analyze.identification.project.plan.repproved');
Route::get('/{project}/identification-project-plan/reanalyze', [IdentificationProjectPlanController::class, 'reanalyze'])->name('projects.analyze.identification.project.plan.reanalyze');
Route::get('/{project}/identification-project-plan/approved', [IdentificationProjectPlanController::class, 'approved'])->name('projects.analyze.identification.project.plan.approved');

// ANALISAR CONTRAPARTIDA SOCIAL DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-contrapartid-social/repproved', [IdentificationProjectContrapartidSocialController::class, 'repproved'])->name('projects.analyze.identification.project.contrapartid.social.repproved');
Route::get('/{project}/identification-project-contrapartid-social/reanalyze', [IdentificationProjectContrapartidSocialController::class, 'reanalyze'])->name('projects.analyze.identification.project.contrapartid.social.reanalyze');
Route::get('/{project}/identification-project-contrapartid-social/approved', [IdentificationProjectContrapartidSocialController::class, 'approved'])->name('projects.analyze.identification.project.contrapartid.social.approved');

// ANALISAR LOCAL DA IDENTIFICACAO DO PROJETO
Route::get('/{project}/identification-project-local/repproved', [IdentificationProjectLocalController::class, 'repproved'])->name('projects.analyze.identification.project.local.repproved');
Route::get('/{project}/identification-project-local/reanalyze', [IdentificationProjectLocalController::class, 'reanalyze'])->name('projects.analyze.identification.project.local.reanalyze');
Route::get('/{project}/identification-project-local/approved', [IdentificationProjectLocalController::class, 'approved'])->name('projects.analyze.identification.project.local.approved');

// LINKS COMPLEMENTARES
Route::put('projects/{project}/complements/repproved', [ProponentComplementController::class, 'repproved'])->name('projects.tabs.complement.repproved');
Route::put('projects/{project}/complements/reanalyze', [ProponentComplementController::class, 'reanalyze'])->name('projects.tabs.complement.reanalyze');
Route::get('projects/{project}/complements/approved', [ProponentComplementController::class, 'approved'])->name('projects.tabs.complement.approved');
Route::get('projects/{project}/complements/print', [ProponentComplementController::class, 'print'])->name('projects.tabs.complement.print');

// ADICIONAR NOTA AO PROJETO
Route::put('projects/{project}/notes/update', [NoteController::class, 'update'])->name('projects.tabs.note.update');
Route::get('projects/{project}/notes/select-project', [NoteController::class, 'selectProject'])->name('projects.tabs.note.select.project');
Route::get('projects/{project}/notes/enable-project', [NoteController::class, 'enableProject'])->name('projects.tabs.note.enable.project');
Route::get('projects/{project}/notes/disable-project', [NoteController::class, 'disableProject'])->name('projects.tabs.note.disable.project');
Route::get('projects/{project}/notes/substitute-project', [NoteController::class, 'substituteProject'])->name('projects.tabs.note.substitute.project');

Route::post('projects/{project}/diligences', [ProponentDiligenceController::class, 'store'])->name('projects.tabs.diligence.store');
Route::put('projects/{project}/diligences/{diligence}', [ProponentDiligenceController::class, 'update'])->name('projects.tabs.diligence.update');
