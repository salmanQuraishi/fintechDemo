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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('email_verified', ['verified', 'unverified'])->default('unverified');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->unique();
            $table->decimal('wallet', 10, 2)->default(0);
            $table->decimal('fund', 10, 2)->default(0);
            $table->enum('kyc_verified', ['verified', 'unverified'])->default('unverified');
            $table->string('password')->nullable();
            $table->string('state',65)->nullable();
            $table->string('city',65)->nullable();
            $table->string('address',255)->nullable();
            $table->string('pincode',65)->nullable();
            $table->string('profile')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
