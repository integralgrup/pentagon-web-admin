<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('catalog', function (Blueprint $table) {
            $table->dropColumn([
                'seo_url',
                'description',
                'bg_image',
                'alt',
                'seo_title',
                'seo_description',
                'seo_keywords'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalog', function (Blueprint $table) {
            $table->string('seo_url', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('bg_image', 255)->nullable();
            $table->string('alt', 255)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_description', 255)->nullable();
            $table->string('seo_keywords', 255)->nullable();
        });
    }
};
