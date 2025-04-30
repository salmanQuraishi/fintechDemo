<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fund_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('deposit_bank');
            $table->decimal('amount', 15, 2);
            $table->string('payment_mode');
            $table->string('pay_slip')->nullable();
            $table->string('from_account');
            $table->string('ref_no')->unique();
            $table->text('remark')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fund_requests');
    }
};
