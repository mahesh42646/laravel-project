<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\Auth\AuthController;
use App\Http\Controllers\Agent\Register\CustomerController;
use App\Http\Controllers\Agent\Register\SearchCustomerController;
use App\Http\Controllers\Agent\Panel\Profile\ProfileController;
use App\Http\Controllers\Agent\Panel\Profile\PasswordController;
use App\Http\Controllers\Agent\Panel\Profile\SocialMediaController;
use App\Http\Controllers\Agent\Panel\Project\ProjectController as PublicProjectCustomerController;
use App\Http\Controllers\Agent\Panel\Project\ProponentController as PublicProjectProponentController;
use App\Http\Controllers\Agent\Panel\Project\ProponentDocumentController as PublicProjectDocumentController;
use App\Http\Controllers\Agent\Panel\Project\ProponentDiligenceController as PublicProjectDiligenceController;
use App\Http\Controllers\Agent\Panel\Home\HomeController;
use App\Http\Controllers\Agent\Panel\Edital\EditalController;
use App\Http\Controllers\Agent\Panel\Project\NotificationController as PublicProjectNotificationController;
use App\Http\Controllers\Agent\Panel\Project\Register\InscriptionController as RegisterInscriptionController;
use App\Http\Controllers\Agent\Panel\Project\Register\IdentificationController as RegisterIdentificationController;
use App\Http\Controllers\Agent\Panel\Project\Register\DocumentController as RegisterDocumentController;
use App\Http\Controllers\Agent\Panel\Project\Register\ComplementController as RegisterComplementController;
use App\Http\Controllers\Agent\Panel\Project\Register\PrintController as RegisterPrintController;
use App\Http\Controllers\Agent\Panel\Project\Edit\InscriptionController as EditInscriptionController;
use App\Http\Controllers\Agent\Panel\Project\Edit\IdentificationController as EditIdentificationController;
use App\Http\Controllers\Agent\Panel\Project\Edit\DocumentController as EditDocumentController;
use App\Http\Controllers\Agent\Panel\Project\Edit\ComplementController as EditComplementController;
use App\Http\Controllers\Agent\Panel\Project\Edit\ProjectDestroyController;

// CADASTRO
Route::name('register.')
    ->group(function () {

        // AGENTE CULTURAL
        Route::name('customers.')
            ->controller(CustomerController::class)
            ->group(function () {
                Route::get('/edital/{editalCode}/visualizar', 'show')->name('show');
                Route::get('/edital/{edital}/cadastro', 'create')->name('create');
                Route::post('/edital/{edital}/cadastro', 'store')->name('store');
            });

        // BUSCAR E VERIFICAR DADOS DO AGENTE CULTURAL
        Route::name('search.')
            ->controller(SearchCustomerController::class)
            ->group(function () {
                Route::get('/edital/{editalCode}/verificar-agente-pf', 'searchAgentCpf')->name('agent.pf.exist');
                Route::get('/edital/{edital}/cadastro/buscar-usuario-cnpj', 'searchCnpj')->name('search.cnpj');
            });
    });

// LOGIN AUTENTICACAO
Route::prefix('usuario')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/', 'index')->name('login');
        Route::post('/autenticar', 'authenticate')->name('authenticate');
    });
    
// PAINEL DE ACESSO
Route::prefix('painel')
    ->middleware('auth.customer')
    ->name('panel.')
    ->group(function () {

        Route::name('home.')
            ->controller(HomeController::class)
            ->group(function () {
                Route::get('/{token}/acesso', 'index')->name('index');
                Route::get('/{token}/ultimos-editais', 'getPaginatedEditals')->name('editals.index');
                Route::get('/{token}/destroy', 'destroy')->name('destroy');
            });

        Route::name('edital.')
            ->controller(EditalController::class)
            ->group(function () {
                Route::get('/{token}/editais', 'index')->name('index');
            });

        Route::name('project.')
            ->group(function () {
                Route::name('register.')->group(function () {
                    Route::name('inscription.')
                        ->controller(RegisterInscriptionController::class)
                        ->group(function () {
                            Route::get('/{token}/edital/{editalCode}/inscricao/criar', 'create')->name('create');
                            Route::post('/{token}/edital/{editalCode}/inscricao/salvar', 'store')->name('store');
                            Route::get('/{token}/projeto/{projectCode}/inscricao/editar', 'edit')->name('edit');
                            Route::put('/{token}/projeto/{projectCode}/inscricao/atualizar', 'update')->name('update');
                        });

                    Route::name('identification.')
                        ->controller(RegisterIdentificationController::class)
                        ->group(function () {
                            Route::get('/{token}/projeto/{projectCode}/identificacao/criar', 'create')->name('create');
                            Route::get('/{token}/projeto/{projectCode}/identificacao/salvar', 'save')->name('save');
                        });

                    Route::name('documents.')
                        ->controller(RegisterDocumentController::class)
                        ->group(function () {
                            Route::get('/{token}/projeto/{projectCode}/documentos/criar', 'create')->name('create');
                            Route::post('/{token}/documentos/salvar', 'store')->name('store');
                            Route::get('/{token}/documentos/veriricar-documentos-requeridos', 'checkDocumentsRequired')->name('check.required');
                        });

                    Route::name('complements.')
                        ->controller(RegisterComplementController::class)
                        ->group(function () {
                            Route::get('/{token}/projeto/{projectCode}/complementos/criar', 'create')->name('create');
                            Route::post('/{token}/projeto/{projectCode}/complementos/salvar', 'store')->name('store');
                            Route::get('/{token}/projeto/{projectCode}/registro/sucesso', 'success')->name('success');
                        });

                    Route::name('comprovant.')
                        ->controller(RegisterPrintController::class)
                        ->group(function () {
                            Route::get('/{token}/projeto/{projectCode}/imprimir', 'print')->name('print');
                            Route::get('/{token}/projeto/{projectCode}/baixar', 'download')->name('download');
                        });
                });

                Route::prefix('visualizar')->name('view.')->group(function () {

                    Route::name('inscription.')
                        ->controller(EditInscriptionController::class)
                        ->group(function () {
                            Route::get('/{token}/projeto/{projectCode}/inscricao/edit', 'edit')->name('edit');
                            Route::put('/{token}/projeto/{projectCode}/inscricao/atualizar', 'update')->name('update');
                        });

                    Route::name('identification.')
                        ->controller(EditIdentificationController::class)
                        ->group(function () {
                            Route::get('/{token}/projeto/{projectCode}/identificacao/editar', 'edit')->name('edit');
                            Route::get('/{token}/projeto/{projectCode}/identificacao/atualizar', 'update')->name('update');
                        });

                    Route::name('documents.')
                        ->controller(EditDocumentController::class)
                        ->group(function () {
                            Route::get('/{token}/projeto/{projectCode}/documentos/editar', 'edit')->name('edit');
                            Route::post('/{token}/documentos/atualizar', 'update')->name('update');
                        });

                    Route::name('complements.')
                        ->controller(EditComplementController::class)
                        ->group(function () {
                            Route::get('/{token}/projeto/{projectCode}/complementos/editar', 'edit')->name('edit');
                            Route::post('/{token}/projeto/{projectCode}/complementos/salvar', 'store')->name('store');
                            Route::delete('/{token}/projeto/{projectCode}/complementos/{id}/remover', 'destroy')->name('destroy');
                        });

                    Route::delete('/{token}/projeto/{projectCode}/destroy', [ProjectDestroyController::class, 'destroy'])->name('destroy');
                });
            });

        Route::get('/{token}/perfil', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/{token}/perfil/editar', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/{token}/perfil/editar', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/{token}/perfil/editar-senha', [PasswordController::class, 'edit'])->name('profile.password.edit');
        Route::put('/{token}/perfil/editar-senha', [PasswordController::class, 'update'])->name('profile.password.update');

        Route::get('/{token}/perfil/midias-sociais', [SocialMediaController::class, 'index'])->name('profile.social.midia.index');
        Route::post('/{token}/perfil/midias-sociais', [SocialMediaController::class, 'store'])->name('profile.social.midia.store');
        Route::delete('/{token}/perfil/midias/{media}/destroy', [SocialMediaController::class, 'destroy'])->name('profile.social.midia.destroy');

        Route::get('/{token}/projeto/{projectCode}/andamento', [PublicProjectCustomerController::class, 'show'])->name('project.show');
        Route::get('/{token}/projeto/{project}/identificacao', [PublicProjectCustomerController::class, 'identify'])->name('project.identify.show');
        Route::get('/{token}/projeto/{projectCode}/editar', [PublicProjectCustomerController::class, 'edit'])->name('project.identify.edit');
        Route::put('/{token}/projeto/{project}/editar', [PublicProjectCustomerController::class, 'update'])->name('project.identify.update');
        Route::get('/{token}/projeto/{projectCode}/download', [PublicProjectCustomerController::class, 'download'])->name('project.download');
        Route::get('/{token}/projeto/{project}/proponente', [PublicProjectProponentController::class, 'show'])->name('project.proponent.show');
        Route::get('/{token}/projeto/{projectCode}/proponente/editar', [PublicProjectProponentController::class, 'edit'])->name('project.proponent.edit');
        Route::put('/{token}/projeto/{project}/proponente/editar', [PublicProjectProponentController::class, 'update'])->name('project.proponent.update');
        Route::get('/{token}/projeto/{projectCode}/notificacoes', [PublicProjectNotificationController::class, 'index'])->name('project.notifications.index');
        
        Route::get('/{token}/projeto/{projectCode}/documento/{documentCode}/identificacao', [PublicProjectDocumentController::class, 'show'])->name('project.document.show');
        Route::get('/{token}/projeto/{projectCode}/documento/{documentCode}/editar', [PublicProjectDocumentController::class, 'edit'])->name('project.document.edit');
        Route::put('/{token}/projeto/{project}/documento/{id}/editar', [PublicProjectDocumentController::class, 'update'])->name('project.document.update');

        Route::get('/{token}/projeto/{projectCode}/diligencia/{diligenceCode}/visualizar', [PublicProjectDiligenceController::class, 'show'])->name('project.diligence.show');
        Route::get('/{token}/projeto/{projectCode}/diligencia/{diligenceCode}/editar', [PublicProjectDiligenceController::class, 'edit'])->name('project.diligence.edit');
        Route::put('/{token}/projeto/{project}/diligencia/{id}/edicao', [PublicProjectDiligenceController::class, 'update'])->name('project.diligence.update');
    });
