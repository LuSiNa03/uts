<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->text('short_description');
            $table->boolean('is_final_project')->default(false); // flag laporan akhir
            // Field khusus laporan akhir (nullable untuk project biasa)
            $table->longText('problem_analysis')->nullable();
            $table->longText('system_requirements')->nullable();
            $table->longText('tech_stack_explanation')->nullable();
            $table->string('erd_image')->nullable();              // upload ERD
            $table->string('flowchart_image')->nullable();
            $table->enum('status', ['planning', 'on_progress', 'completed'])->default('planning');
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
