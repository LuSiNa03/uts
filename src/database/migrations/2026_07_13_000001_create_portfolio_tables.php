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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('icon')->nullable();
            $table->integer('level')->default(80);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('company');
            $table->string('period')->nullable();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->json('skills')->nullable();
            $table->string('color')->default('#800020');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->string('field')->nullable();
            $table->string('period')->nullable();
            $table->string('gpa')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('current')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('issuer')->nullable();
            $table->string('date')->nullable();
            $table->string('image')->nullable();
            $table->string('color')->default('#800020');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('org')->nullable();
            $table->string('year')->nullable();
            $table->string('icon')->nullable();
            $table->string('category')->nullable();
            $table->string('color')->default('#800020');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->string('date')->nullable();
            $table->string('read_time')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->string('color')->default('#800020');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('certificates');
        Schema::dropIfExists('education');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('skills');
    }
};
