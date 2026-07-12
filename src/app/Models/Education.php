<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = ['level', 'field', 'period', 'gpa', 'icon', 'current', 'order'];

    protected $casts = [
        'current' => 'boolean',
    ];
}
