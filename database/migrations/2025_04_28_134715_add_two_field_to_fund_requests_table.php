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
        Schema::table('fund_requests',  function (Blueprint $table) {
            $table->string('api_txn_id')->nullable()->default(null);
            $table->string('qr_code_id')->nullable()->default(null);
            $table->string('user_txn_id')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fund_requests', function (Blueprint $table) {
            $table->dropColumn('api_txn_id');
            $table->dropColumn('qr_code_id');
            $table->dropColumn('user_txn_id');
        });
    }
};
