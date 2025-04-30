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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable()->default(null);
            $table->string('placeholder')->nullable()->default(null);
            $table->foreignId('business_type_id')->nullable()->constrained('business_types');
            $table->enum('type',['file','text','number'])->nullable()->default('text');
            $table->boolean('required')->nullable()->default(true);
            $table->enum( 'status',['active','inactive'])->nullable()->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
