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
        Schema::table('blog', function (Blueprint $table) {
            $table->string('seo_url', 255)->after('title');
        });

        Schema::table('brand', function (Blueprint $table) {
            $table->string('seo_url', 255)->after('title');
        });

        Schema::table('sector', function (Blueprint $table) {
            $table->string('seo_url', 255)->after('title');
        });
    }

    public function down()
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn('seo_url');
        });

        Schema::table('brand', function (Blueprint $table) {
            $table->dropColumn('seo_url');
        });

        Schema::table('sector', function (Blueprint $table) {
            $table->dropColumn('seo_url');
        });
    }
};
