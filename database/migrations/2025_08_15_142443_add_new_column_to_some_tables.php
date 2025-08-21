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
        Schema::table('about_how_we_do', function (Blueprint $table) {
            $table->integer('content_id')->after('id');
        });

        Schema::table('about_what_we_do', function (Blueprint $table) {
            $table->integer('content_id')->after('id');
        });

        Schema::table('about_memberships', function (Blueprint $table) {
            $table->integer('content_id')->after('id');
        });
        //about_politics
        Schema::table('about_politics', function (Blueprint $table) {
            $table->integer('content_id')->after('id');
        });
    }

    public function down()
    {
        Schema::table('about_how_we_do', function (Blueprint $table) {
            $table->dropColumn('content_id');
        });

        Schema::table('about_what_we_do', function (Blueprint $table) {
            $table->dropColumn('content_id');
        });

        Schema::table('about_memberships', function (Blueprint $table) {
            $table->dropColumn('content_id');
        });

        Schema::table('about_politics', function (Blueprint $table) {
            $table->dropColumn('content_id');
        });
    }
};
