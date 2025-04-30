<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('tbl_setting', function (Blueprint $table) {
            $table->id();
            $table->string('logo_light')->nullable();
            $table->string('light_icon')->nullable();
            $table->string('logo_dark')->nullable();
            $table->string('dark_icon')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_setting');
    }
};
