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
        Schema::table('catalog', function (Blueprint $table) {
            $table->integer('catalog_group_id')->after('id');
        });
    }

    public function down()
    {
        Schema::table('catalog', function (Blueprint $table) {
            $table->dropColumn('catalog_group_id');
        });
    }
};
