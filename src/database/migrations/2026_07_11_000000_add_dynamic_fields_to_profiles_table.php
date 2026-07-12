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
        Schema::table('profiles', function (Blueprint $table) {
            $table->json('skills_categorized')->nullable();
            $table->json('experiences')->nullable();
            $table->json('education')->nullable();
            $table->json('certificates')->nullable();
            $table->json('achievements')->nullable();
            $table->json('blogs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'skills_categorized',
                'experiences',
                'education',
                'certificates',
                'achievements',
                'blogs',
            ]);
        });
    }
};
