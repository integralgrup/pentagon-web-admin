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
        Schema::table('brand_slider_2', function (Blueprint $table) {
            $table->string('category')->after('title');
            $table->string('url')->after('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brand_slider_2', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('url');
        });
    }
};
