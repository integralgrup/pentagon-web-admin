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
        

        Schema::table('sector', function (Blueprint $table) {
            $table->integer('sector_id')->after('id');
        });

        Schema::table('menu', function (Blueprint $table) {
            $table->integer('menu_id')->after('id');
        });

        Schema::table('career_jobs', function (Blueprint $table) {
            $table->integer('job_id')->after('id');
        });

        Schema::table('blog_slider', function (Blueprint $table) {
            $table->integer('slider_id')->after('id');
        });

        Schema::table('catalog', function (Blueprint $table) {
            $table->integer('catalog_id')->after('id');
        });

        Schema::table('catalog_file', function (Blueprint $table) {
            $table->integer('file_id')->after('id');
        });

        Schema::table('office', function (Blueprint $table) {
            $table->integer('office_id')->after('id');
        });

        Schema::table('sector_slider_1', function (Blueprint $table) {
            $table->integer('sector_id')->after('id');
        });

        Schema::table('sector_slider_2', function (Blueprint $table) {
            $table->integer('sector_id')->after('id');
        });
    }

    public function down()
    {
        

        Schema::table('sector', function (Blueprint $table) {
            $table->dropColumn('sector_id');
        });

        Schema::table('menu', function (Blueprint $table) {
            $table->dropColumn('menu_id');
        });

        Schema::table('career_jobs', function (Blueprint $table) {
            $table->dropColumn('job_id');
        });

        Schema::table('blog_slider', function (Blueprint $table) {
            $table->dropColumn('slider_id');
        });

        Schema::table('catalog', function (Blueprint $table) {
            $table->dropColumn('catalog_id');
        });

        Schema::table('catalog_file', function (Blueprint $table) {
            $table->dropColumn('file_id');
        });

        Schema::table('office', function (Blueprint $table) {
            $table->dropColumn('office_id');
        });

        Schema::table('sector_slider_1', function (Blueprint $table) {
            $table->dropColumn('sector_id');
        });

        Schema::table('sector_slider_2', function (Blueprint $table) {
            $table->dropColumn('sector_id');
        });
    }
};
