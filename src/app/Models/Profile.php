<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'tagline', 'bio', 'avatar',
        'email', 'github', 'linkedin', 'skills',
        'skills_categorized', 'experiences', 'education',
        'certificates', 'achievements', 'blogs',
        'career_objective', 'university', 'hero_badges',
    ];

    protected $casts = [
        'skills' => 'array',
        'skills_categorized' => 'array',
        'experiences' => 'array',
        'education' => 'array',
        'certificates' => 'array',
        'achievements' => 'array',
        'blogs' => 'array',
        'hero_badges' => 'array',
    ];
}