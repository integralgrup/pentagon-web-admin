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
        Schema::create('sector_slider_1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang', 10);
            $table->integer('slider_id');
            $table->string('title', 100);
            $table->string('title_1', 255);
            $table->text('description'); // text(500) size isn’t specified in Laravel, text is default
            $table->string('image', 255);
            $table->string('alt', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable(); // manual deleted_at, not softDeletes()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sector_slider_1');
    }
};
