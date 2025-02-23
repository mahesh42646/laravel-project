<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

final class State extends Model
{
    protected $table = 'states';

    protected $fillable = [
        'name',
        'uf',
    ];
}
