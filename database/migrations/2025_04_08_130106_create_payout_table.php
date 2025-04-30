<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_payout', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming a 'users' table exists
            $table->string('txn_id')->unique();
            $table->string('user_txn_id')->nullable()->default(null);
            $table->decimal('amount', 11, 2);
            $table->string('account_no')->nullable();
            $table->string('ifsc')->nullable();
            $table->enum('mode', ['IMPS', 'NEFT', 'RTGS'])->default('IMPS');
            $table->enum('type', ['api', 'portal'])->default('portal');
            $table->string('bank_ref')->nullable()->default(null);
            $table->string('bank_id')->nullable()->default(null);
            $table->decimal('opening_bal', 11, 2)->default(0);
            $table->decimal('closing_bal', 11, 2)->default(0);
            $table->text('bank_details')->nullable()->default(null); // To store all bank info sent for payout
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->decimal('txn_charge', 15, 2)->nullable();
            $table->decimal('admin_charge', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_payout');
    }
}
