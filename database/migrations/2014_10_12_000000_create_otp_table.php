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
        Schema::create('tbl_otp', function (Blueprint $table) {
            $table->id();
            $table->string('otp');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('type')->nullable();
            // Define 'status' as an enum with possible values
            $table->enum('status', ['pending', 'verified', 'expired'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_otp');
    }
};