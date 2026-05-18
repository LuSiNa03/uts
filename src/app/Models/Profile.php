<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'tagline', 'bio', 'avatar',
        'email', 'github', 'linkedin', 'skills',
    ];

    protected $casts = [
        'skills' => 'array',
    ];
}