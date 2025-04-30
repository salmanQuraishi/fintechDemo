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
        Schema::create('payin_api_logs', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable()->default(null);
            $table->text('request_body')->nullable()->default(null);
            $table->text('request_header')->nullable()->default(null);
            $table->text('response_body')->nullable()->default(null);
            $table->text('response_header')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payin_api_logs');
    }
};
