<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_aadhaar_verify', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('aadhaar_number'); // 'live' or 'demo'
            $table->string('reference_id'); // base URL (string)
            $table->integer('api_timestamp'); // API Key (string)
            $table->enum('status',["verified","unverified","pending"])->default("pending"); // API Key (string)
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_aadhaar_verify');
    }
};
