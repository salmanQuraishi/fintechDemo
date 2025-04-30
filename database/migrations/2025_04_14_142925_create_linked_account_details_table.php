<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkedAccountDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('linked_account_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('short_description')->nullable();
            $table->string('short_description_2')->nullable();
            $table->enum('status', ['active', 'upcomming', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('linked_account_details');
    }
}