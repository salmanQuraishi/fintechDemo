<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomineeInfosTable extends Migration
{
    public function up()
    {
        Schema::create('nominee_info', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('relationship')->nullable();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->string('pincode')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nominee_info');
    }
}
