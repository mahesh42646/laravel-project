<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingPage\HomeController as HomeLandingPageController;

use App\Http\Controllers\SuperAdmin\TenantController;
use App\Http\Controllers\SuperAdmin\AuthController as SuperAdminAuthController;
use App\Http\Controllers\SuperAdmin\HomeController as SuperAdminHomeController;
use App\Http\Controllers\SuperAdmin\UserController as SuperAdminUserController;
use App\Http\Controllers\SuperAdmin\CompanyController as SuperAdminCompanyController;
use App\Http\Controllers\SuperAdmin\ProfileController as SuperAdminProfileController;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Tenant\Customer\CustomerController;
use App\Http\Controllers\Tenant\Customer\PasswordController;
use App\Http\Controllers\Tenant\Edital\AvaliatorController;
use App\Http\Controllers\Tenant\Edital\EditalController;
use App\Http\Controllers\Tenant\Home\HomeController;
use App\Http\Controllers\Tenant\Notification\NotificationController;
use App\Http\Controllers\Tenant\Professional\ProfessionalController;
use App\Http\Controllers\Tenant\Setting\Profile\ProfileController;
use App\Http\Controllers\SuperAdmin\CityController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuperAdmin\ArtistController;
use App\Http\Controllers\SuperAdmin\BlogController;
use App\Http\Controllers\Tenant\Professional\BindingController;
use App\Http\Controllers\Tenant\Setting\Edital\DocumentTypeController;

// LANDING PAGE
Route::name('landing.page.')->group(function () {
    Route::get('/', [HomeLandingPageController::class, 'index'])->name('home');
    Route::get('/contato', [HomeLandingPageController::class, 'contact'])->name('contact');
    Route::get('/editais', [HomeLandingPageController::class, 'edital'])->name('edital');
    Route::get('/noticias', [HomeLandingPageController::class, 'post'])->name('posts.index');
    Route::get('/noticias/{slug}', [HomeLandingPageController::class, 'viewPost'])->name('posts.show');
});

// AUTENTICACAO SUPER ADMIN
Route::controller(SuperAdminAuthController::class)
    ->name('auth.super.admin.')
    ->group(function () {
        Route::get('/super-admin', 'login')->name('login');
        Route::post('/admin/authenticate', 'authenticate')->name('authenticate');
        Route::get('/admin/logout', 'logout')->name('logout');
    });

// DASHBOARD SUPER ADMIN
Route::prefix('dash')
    ->middleware('auth')
    ->name('dash.')
    ->group(function () {
        Route::get('/', [SuperAdminHomeController::class, 'index'])->name('home');
        Route::get('/tenants/{id}/dashboard', [SuperAdminHomeController::class, 'byTenant'])->name('tenant');

        // USUARIOS
        Route::get('users/{user}/reset-password', [SuperAdminUserController::class, 'resetPasswordView'])->name('users.reset.password.view');
        Route::put('users/{user}/reset-password', [SuperAdminUserController::class, 'resetPassword'])->name('users.reset.password.update');
        Route::post('users/search', [SuperAdminUserController::class, 'search'])->name('users.search');
        Route::resource('users', SuperAdminUserController::class);

        // TENANTS
        Route::post('tenants/search', [TenantController::class, 'search'])->name('tenants.search');
        Route::resource('tenants', TenantController::class);

        // ARTISTAS
        Route::get('artists', [ArtistController::class, 'index'])->name('artists.index');
        Route::post('artists/search', [ArtistController::class, 'search'])->name('artists.search');
        Route::delete('artists/{artist}/destroy', [ArtistController::class, 'destroy'])->name('artists.destroy');

        // CIDADES
        Route::post('cities/search', [CityController::class, 'search'])->name('cities.search');
        Route::resource('cities', CityController::class);

        // EMPRESAS
        Route::post('companies/search', [SuperAdminCompanyController::class, 'search'])->name('companies.search');
        Route::resource('companies', SuperAdminCompanyController::class);

        // POSTAGENS
        Route::post('attach-file', [BlogController::class, 'attachFile'])->name('posts.attach.file');
        Route::post('posts/search', [BlogController::class, 'search'])->name('posts.search');
        Route::resource('posts', BlogController::class);

        // PROFILE
        Route::prefix('profile')
            ->name('profile.')
            ->controller(SuperAdminProfileController::class)
            ->group(function () {
                Route::get('show', 'show')->name('show');
                Route::get('edit', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');
                Route::get('password', 'showPassword')->name('password');
                Route::put('change-password', 'changePassword')->name('change.password');
            });
    });

// AUTENTICACAO ADMIN
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('login', 'authenticate')->name('authenticate');
    Route::get('login-passwordless', 'authenticatePasswordless')->name('passwordless.authenticate');
    Route::get('logout', 'logout')->name('logout');
    Route::get('forgot-password', 'forgotPassword')->name('forgot.password');
    Route::post('forgot-password', 'forgot')->name('forgot');
    Route::get('reset-password/{user}/{token}', 'resetPassword')->name('reset.password');;
    Route::post('reset-password', 'reset')->name('reset');
});

Route::prefix('panel')->middleware('auth')->group(function () {

    Route::get('/', HomeController::class)->name('panel');
    Route::get('chart-financial', [HomeController::class, 'getChartData'])->name('panel.chart.financial');

    // PROFILE
    Route::prefix('profile')
        ->name('profile.')
        ->controller(ProfileController::class)
        ->group(function () {
            Route::get('show', 'show')->name('show');
            Route::get('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
            Route::get('password', 'showPassword')->name('password');
            Route::put('change-password', 'changePassword')->name('change.password');
        });

    // DOCUMENTOS DE EDITAIS
    Route::get('editals-documents-types', [DocumentTypeController::class, 'index'])->name('editals.documents.types.index');
    Route::post('editals-documents-types', [DocumentTypeController::class, 'store'])->name('editals.documents.types.store');
    Route::put('editals-documents-types/{document}', [DocumentTypeController::class, 'update'])->name('editals.documents.types.update');

    // PROFISSIONAIS
    Route::put('professionals/{professional}/reset-password', [ProfessionalController::class, 'resetPassword'])->name('professionals.reset.password.update');
    Route::post('professionals/search', [ProfessionalController::class, 'search'])->name('professionals.search');
    Route::post('professionals/search-occupation', [ProfessionalController::class, 'searchOccupation'])->name('professionals.search.occupation');
    Route::resource('professionals', ProfessionalController::class);

    // VINCULOS COM EDITAIS
    Route::get('professionals/{professional}/bindings', [BindingController::class, 'index'])->name('professionals.bindings.index');
    Route::delete('editals/{edital}/avaliators/{avaliator}/bindings', [BindingController::class, 'destroy'])->name('professionals.bindings.destroy');

    // AGENTES CULTURAIS
    Route::get('customers/{customer}/edit-password', [PasswordController::class, 'edit'])->name('customers.password.edit');
    Route::put('customers/{customer}/edit-password', [PasswordController::class, 'update'])->name('customers.password.update');
    Route::post('customers/search', [CustomerController::class, 'search'])->name('customers.search');
    Route::post('customers/search-city', [CustomerController::class, 'searchCity'])->name('customers.search.city');
    Route::resource('customers', CustomerController::class);

    // EDITAIS
    Route::get('editals/{edital}/assign-evaluator', [AvaliatorController::class, 'index'])->name('editals.assign.avaliator.index');
    Route::post('editals/{edital}/assign-evaluator/create', [AvaliatorController::class, 'store'])->name('editals.assign.avaliator.store');
    Route::delete('editals/{edital}/unlink/{avaliator}', [AvaliatorController::class, 'destroy'])->name('editals.assign.avaliator.destroy');
    Route::delete('editals/{edital}/attachments/{attachment}/destroy', [EditalController::class, 'destroyAttachment'])->name('editals.attachment.destroy');
    Route::post('editals/search', [EditalController::class, 'search'])->name('editals.search');
    Route::resource('editals', EditalController::class);

    // PROJETOS
    Route::prefix('projects')->group(
        base_path('routes/partials/project.php')
    );

    // NOTIFICATION
    Route::name('notifications.')
        ->controller(NotificationController::class)
        ->group(function () {
            Route::get('notifications', 'index')->name('index');
            Route::get('notifications/{notification}', 'show')->name('show');
        });

    Route::resource('settings', SettingController::class);
});

// MODULO AGENTE CULTURAL
Route::prefix('agente')
    ->name('public.')
    ->group(base_path('routes/partials/agent.php'));

Route::fallback(function () {
    return view('errors.404');
});
