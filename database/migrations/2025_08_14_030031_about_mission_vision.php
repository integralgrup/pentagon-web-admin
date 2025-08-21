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
        Schema::create('about_mission_vision', function (Blueprint $table) {
            $table->id();
            $table->string('lang', 10);
            $table->string('mission_title', 255);
            $table->string('mission_description', 255);
            $table->string('mission_image', 255);
            $table->string('mission_alt', 255);
            $table->string('vision_title', 255);
            $table->string('vision_description', 255);
            $table->string('vision_image', 255);
            $table->string('vision_alt', 255);
            $table->string('bg_video', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_mission_vision');
    }
};
