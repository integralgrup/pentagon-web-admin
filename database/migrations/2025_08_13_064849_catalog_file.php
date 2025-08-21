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
        Schema::create('catalog_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catalog_id');
            $table->string('lang', 10);
            $table->string('title', 250);
            $table->text('description'); // text(500) not specifically supported, use text
            $table->string('image', 255);
            $table->string('alt', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('catalog_file');
    }
};
