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
        Schema::table('tbl_apis', function (Blueprint $table) {
            $table->string('username')->nullable()->default(null)->after('mode');
            $table->string('pwd')->nullable()->default(null)->after('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_apis', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('pwd');
        });
    }
};
