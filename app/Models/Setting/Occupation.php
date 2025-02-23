<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = 'cbos';

    protected $fillable = [
        'name',
    ];
}
