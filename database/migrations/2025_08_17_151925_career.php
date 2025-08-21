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
        Schema::create('career', function (Blueprint $table) {
            $table->id();
            $table->string('lang', 10);
            $table->string('title', 100);
            $table->string('title_1', 255);
            $table->text('description');
            $table->string('image', 255);
            $table->string('alt', 255);
            $table->string('button_text', 50)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_description', 255)->nullable();
            $table->string('seo_keywords', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes(); // softdeletes column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career');
    }
};
