<?php

namespace App\Models\Notification;

use App\Enums\Notification\TypeStatusEnum;
use App\Models\Customer\Customer;
use App\Models\Project\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'title',
        'type_id',
        'project_id',
        'from_user_id',
        'to_customer_id',
        'readed_at',
    ];

    protected $casts = [
        'type_id' => TypeStatusEnum::class
    ];

    // METHODS

    public static function getMessage(int $customerId, string $token): string
    {
        return '';

        $notifications = DB::select(
            "SELECT 
                COUNT(notifications.id) AS total, 
                projects.id AS project_id,
                projects.name AS project_name
            FROM notifications
            INNER JOIN projects
            ON notifications.project_id = projects.id
            WHERE notifications.to_customer_id = ?
            AND notifications.readed_at IS NULL
            GROUP BY projects.name, projects.id", [$customerId]
        );

        if (count($notifications) <= 0) {
            return '';
        }

        return static::message($notifications, $token);
    }

    private static function message(array $notifications, string $token): string
    {
        $payloads = '';

        foreach ($notifications as $notification) {
            $route = route('public.panel.project.notifications.index', [$token, base64_encode($notification->project_id)]);
            $payloads .= <<<HTML
                <div class="alert text-dark alert-warning alert-dismissible fade show" role="alert">
                    <div>
                        <strong>Atenção!</strong> Existem notificações relacionadas ao seu projeto <strong>"{$notification->project_name}"</strong> 
                        <a href="{$route}" class="btn btn-dark font-weight-medium px-3 rounded-lg ml-2">Visualizar</a>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            HTML;
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

    public function from_user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'from_user_id',
        );
    }

    public function to_customer(): BelongsTo
    {
        return $this->belongsTo(
            related: Customer::class,
            foreignKey: 'to_customer_id',
        );
    }
}
