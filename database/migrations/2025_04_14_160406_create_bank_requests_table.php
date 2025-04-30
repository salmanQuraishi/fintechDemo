<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bank_requests', function (Blueprint $table) {
            $table->id();
            $table->string('bank_request_id')->nullable();

            // Foreign keys
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Enum status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            // Timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_requests');
    }
};
