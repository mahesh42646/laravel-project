<?php

namespace App\Providers;

use App\View\Composers\RoleComposer;
use App\View\Composers\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'categories.index',
            'categories.create',
            'categories.edit',
            
            'professionals.create',
            'professionals.edit',
            'professionals.show',
            
            'receptionists.create',
            'receptionists.edit',

            'patients.index',
            'patients.create',
            'patients.show',
            'patients.edit',

            'home.index',
            'super-admin.dash.index',
            'routine.traceability.index',
        ], UserComposer::class);

        View::composer([
            'categories.index',
            'categories.create',
            'categories.edit',

            'exams.index',
            'exams.create',
            'exams.edit',
            'exams.models.create',
            'exams.models.edit',

            'routine.map.patient.index',
            'routine.map.biomedical.index',
            'routine.appointment-by-day.index',
            'routine.production-by-biomedical.index',
            'routine.production-by-unity.index',
            'routine.tag.index',

            'professionals.index',
            'professionals.create',
            'professionals.edit',
            'professionals.show',

            'biomedicals.index',
            'biomedicals.create',
            'biomedicals.show',
            'biomedicals.edit',

            'receptionists.index',
            'receptionists.create',
            'receptionists.edit',

            'patients.index',
            'patients.create',
            'patients.show',
            'patients.edit',

            'appointments.index',
            'appointments.result.create',
            'appointments.result.show',
            'appointments.schedule',
            'appointments.create',
            'appointments.edit',

            'index',
            'routine.traceability.index',
        ], RoleComposer::class);
    }
}
