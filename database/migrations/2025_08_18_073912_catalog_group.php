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
        Schema::create('catalog_group', function (Blueprint $table) {
            $table->increments('id'); // INT AUTO_INCREMENT (primary key)

            $table->integer('catalog_group_id')->nullable();
            $table->integer('brand_id')->nullable();

            $table->string('lang', 10);
            $table->string('title', 100);

            $table->string('bg_image', 255);
            $table->string('alt', 255);

            $table->string('seo_title', 255)->nullable();
            $table->string('seo_description', 255)->nullable();
            $table->string('seo_keywords', 255)->nullable();

            $table->integer('sort')->default(0);

            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_group');
    }
};
