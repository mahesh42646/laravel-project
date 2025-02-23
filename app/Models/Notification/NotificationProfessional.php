<?php

namespace App\Models\Notification;

use App\Models\Customer\Customer;
use App\Models\Project\Project;
use App\Models\SuperAdmin\Tenant\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class NotificationProfessional extends Model
{
    protected $table = 'notification_professionals';

    protected $fillable = [
        'title',
        'project_id',
        'from_customer_id',
        'to_professional_id',
        'readed_at',
    ];

    // MODEL BINDING CUSTOM

    public function resolveRouteBinding($value, $field = null)
    {
        if (session('tenant_id')) {
            $notification = $this->where('id', $value)
                ->where('tenant_id', session('tenant_id'))
                ->first();
            
            if (! $notification) {
                return abort(403);
            }

            return $notification;
        }

        return $this->where('id', $value)->firstOrFail();
    }

    // METHODS

    public static function getMessages(): string
    {
        $payloads = [];

        return '';


        $alerts = DB::select(
            "SELECT
                notifications.id,
                customers.name AS customer_name
            FROM notification_professionals AS notifications
            INNER JOIN customers
            ON notifications.from_customer_id = customers.id
            WHERE notifications.to_professional_id = ?
            AND notifications.readed_at IS NULL", [auth()->id()]
        );

        if (count($alerts) <= 0) {
            return '';
        }

        foreach ($alerts as $alert) {
            $payloads[$alert->customer_name] = $alert->id;
        }

        return static::message($payloads);
    }

    private static function message(array $notifications): string
    {
        $content = '';

        foreach ($notifications as $customer => $id) {
            $routeShow = route('notifications.show', $id);
            $content .= <<<HTML
                <div class="alert text-dark alert-warning alert-dismissible fade show" role="alert">
                    <div>
                        <strong>Atenção!</strong> Existem notificações relacionadas ao projeto do artista <strong>{$customer}</strong> 
                        <a href="{$routeShow}" class="btn btn-dark font-weight-medium px-3 rounded-lg ml-2">Visualizar</a>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            HTML;
        }

        return $content;
    }

    public static function getAll(): array
    {
        $customers = DB::select(
            "SELECT
                notifications.id,
                notifications.title,
                notifications.created_at
            FROM notification_professionals AS notifications
            WHERE notifications.to_professional_id = ?
            AND notifications.readed_at IS NULL", [auth()->id()]
        );

        return $customers;
    }

    public static function alerts(): array
    {
        $payloads = [];
        $notifications = DB::select(
            "SELECT
                notifications.title,
                notifications.created_at,
                customers.profile_photo,
                projects.id AS project_id,
                projects.name AS project_name
            FROM notification_professionals AS notifications
            INNER JOIN customers
            ON notifications.from_customer_id = customers.id
            INNER JOIN projects
            ON notifications.project_id = projects.id 
            WHERE notifications.to_professional_id = ?
            ORDER BY notifications.id DESC", [auth()->id()]
        );

        foreach ($notifications as $notification) {
            $payloads[] = (object) [
                'title' => $notification->title,
                'created_at' => date('d/m/Y H:i', strtotime($notification->created_at)),
                'project' => (object) [
                    'id' => $notification->project_id,
                    'name' => $notification->project_name,
                ], $notification->project_name,
                'avatar' => (! $notification->profile_photo)
                    ? asset('assets/images/users/noImage.webp')
                    : asset("storage/{$notification->profile_photo}"),
            ];
        }

        return $payloads;
    }

    // RELATIONSHIPS

    public function project(): BelongsTo
    {
        return $this->belongsTo(
            related: Project::class,
            foreignKey: 'project_id',
        );
    }

    public function from_customer(): BelongsTo
    {
        return $this->belongsTo(
            related: Customer::class,
            foreignKey: 'from_customer_id',
        );
    }

    public function to_professional(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'to_professional_id',
        );
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'tenant_id',
        );
    }
}
