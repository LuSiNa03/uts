<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['role', 'company', 'period', 'type', 'description', 'skills', 'color', 'order'];

    protected $casts = [
        'skills' => 'array',
    ];
}
