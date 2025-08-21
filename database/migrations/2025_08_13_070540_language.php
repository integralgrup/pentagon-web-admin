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
        Schema::create('language', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang_code', 10);
            $table->string('title', 100);
            $table->string('about_url', 255);
            $table->string('sector_url', 255);
            $table->string('brand_url', 255);
            $table->string('career_url', 255);
            $table->string('catalog_url', 255);
            $table->string('blog_url', 255);
            $table->string('contact_url', 255);
            $table->string('uploads_folder', 255);
            $table->string('images_folder', 255);
            $table->string('sector_images_folder', 255);
            $table->string('brand_images_folder', 255);
            $table->string('blog_images_folder', 255);
            $table->string('catalog_files_folder', 255);
            $table->text('ga_code')->nullable();
            $table->text('bitrix_form_code')->nullable();
            $table->text('bitrix_widget_code')->nullable();
            $table->integer('sort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language');
    }
};
