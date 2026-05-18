<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'thumbnail', 'short_description',
        'is_final_project', 'problem_analysis', 'system_requirements',
        'tech_stack_explanation', 'erd_image', 'flowchart_image',
        'status', 'github_url', 'demo_url', 'order',
    ];

    protected $casts = [
        'is_final_project' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });
    }
}