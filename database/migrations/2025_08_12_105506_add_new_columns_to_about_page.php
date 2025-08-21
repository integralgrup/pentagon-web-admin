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
        Schema::table('about_page', function (Blueprint $table) {
            $table->string('mission_title', 100)->after('alt');
            $table->string('mission_text', 255)->after('mission_title');
            $table->string('mission_image', 255)->after('mission_text');
            $table->string('vision_title', 100)->after('mission_image');
            $table->string('vision_text', 255)->after('vision_title');
            $table->string('vision_image', 255)->after('vision_text');
        });
    }

    public function down()
    {
        Schema::table('about_page', function (Blueprint $table) {
            $table->dropColumn(['mission_title', 'mission_text', 'mission_image', 'vision_title', 'vision_text', 'vision_image']);
        });
    }
};
