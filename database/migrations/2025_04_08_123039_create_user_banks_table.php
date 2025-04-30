<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBanksTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_user_banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming there's a 'users' table for user relation
            $table->string('account_holder_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('account_type')->nullable();
            $table->string('bank_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_user_banks');
    }
}
