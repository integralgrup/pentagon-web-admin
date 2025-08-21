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
        Schema::create('career_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang', 10);
            $table->string('title', 100);
            $table->string('short_description', 255);
            $table->text('description');
            $table->string('outer_url', 255)->nullable();
            $table->string('button_text', 50)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_description', 255)->nullable();
            $table->string('seo_keywords', 255)->nullable();
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
        Schema::dropIfExists('career_jobs');
    }
};
