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
        Schema::create('footer_info', function (Blueprint $table) {
            $table->id();
            $table->string('lang', 10); // hidden input, not null
            $table->string('address', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('map_url', 255);
            $table->string('facebook_url', 255);
            $table->string('youtube_url', 255);
            $table->string('linkedin_url', 255);
            $table->string('x_url', 255);
            $table->string('instagram_url', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_info');
    }
};
