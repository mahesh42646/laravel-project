<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

final class Handler extends ExceptionHandler
{
    protected $dontReport = [];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function context(): array
    {
        return array_merge(parent::context(), [
            'user_name' => 
                auth()->check()
                    ? auth()->user()->name . ' ' . request()->getHost()
                    : request()->getHost()
        ]);
    }
}
