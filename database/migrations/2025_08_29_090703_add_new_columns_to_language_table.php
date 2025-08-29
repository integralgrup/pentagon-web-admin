<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('language', function (Blueprint $table) {
            $table->string('domain')->after('lang_code');
            $table->string('path')->after('domain');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('language', function (Blueprint $table) {
            $table->dropColumn('domain');
            $table->dropColumn('path');
        });
    }
};
