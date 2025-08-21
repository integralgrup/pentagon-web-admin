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
        Schema::create('static_text', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang', 10);
            $table->string('title', 100);
            $table->string('page_name', 50)->nullable();
            $table->integer('text_id');
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('static_text');
    }
};
