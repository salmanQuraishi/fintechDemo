<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndipaymentApiLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_indipayment_api_logs', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('user_id')->nullable(); // User ID (nullable)
            $table->string('url')->nullable(); // URL (nullable)
            $table->string('type')->nullable(); // Type (nullable)
            $table->string('txn_id')->nullable(); // Transaction ID (nullable and unique)
            $table->text('request_headers')->nullable(); // Request headers (nullable)
            $table->text('request_body')->nullable(); // Request body (nullable)
            $table->text('response_body')->nullable(); // Response body (nullable)
            $table->timestamps(); // Created at and updated at timestamps (nullable by default)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_indipayment_api_logs');
    }
}
