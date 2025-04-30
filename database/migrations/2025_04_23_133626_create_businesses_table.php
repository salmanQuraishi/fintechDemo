<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('businesskyc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->unsignedBigInteger('business_type_id');
            $table->unsignedBigInteger('business_category_id');
            $table->unsignedBigInteger('business_sub_category_id')->nullable();
            $table->text('business_description')->nullable();
            $table->enum('payment_status', ['Without website/app', 'On my website/app'])->nullable();
            $table->json('documents')->nullable();
            $table->string('address',191)->nullable();
            $table->string('pincode',191)->nullable();
            $table->string('state',191)->nullable();
            $table->string('city',191)->nullable();
            $table->enum('status', ['pending', 'approve', 'reject'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesskyc');
    }
}
