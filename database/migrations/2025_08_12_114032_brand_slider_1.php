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
        Schema::create('brand_slider_1', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id');
            $table->string('lang', 10);
            $table->integer('slider_id');
            $table->string('title', 100);
            $table->string('title_1', 255);
            $table->text('description'); // Laravel doesn't have text(500), just text
            $table->string('image', 255);
            $table->string('alt', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes(); // replaces manual deleted_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_slider_1');
    }
};
