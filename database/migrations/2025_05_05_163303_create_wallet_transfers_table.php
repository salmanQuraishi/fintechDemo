<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTransfersTable extends Migration
{
    public function up()
    {
        Schema::create('wallet_transfers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->unsignedBigInteger('admin_id')->nullable();

            $table->decimal('amount', 15, 2)->default(0);

            $table->text('note')->nullable();

            $table->enum('status', ['pending', 'complete', 'failed'])->default('pending');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wallet_transfers');
    }
}
