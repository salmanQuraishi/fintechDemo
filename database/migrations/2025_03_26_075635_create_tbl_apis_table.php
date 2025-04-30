<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblApisTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_apis', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('name',191); // base URL (string)
            $table->enum('mode', ['live', 'demo']); // 'live' or 'demo'
            $table->string('base_url'); // base URL (string)
            $table->string('key'); // API Key (string)
            $table->string('secret'); // API Secret (string)
            $table->text('token'); // Token (string)
            $table->timestamp('token_renewed_at')->nullable(); // Token renewal time (nullable timestamp)
            $table->integer('renew_duration'); // Token renewal duration (integer, in minutes or seconds)
            $table->enum('status', ['active', 'inactive']); // 'active' or 'inactive'
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_apis');
    }
}
