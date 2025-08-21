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
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang', 10);
            $table->string('title', 255);
            $table->string('seo_url', 255);
            $table->string('image', 255);
            $table->string('alt', 255);
            $table->enum('menu_type', ['header', 'footer', 'sidebar'])->default('header');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('sort')->default(0);
            $table->integer('isActive')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
