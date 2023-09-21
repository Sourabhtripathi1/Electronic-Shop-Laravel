<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('User_id', 15)->primary();
            $table->string('Username', 30);
            $table->string('Password', 15);
            $table->string('Name', 40);
            $table->date('DOB');
            $table->string('Profile_pic', 40);
            $table->foreign('Profile_pic')->references('Picture_id')->on('pictures');
            $table->string('House_no', 15);
            $table->string('Street', 30);
            $table->string('Area', 20);
            $table->string('District', 30);
            $table->string('State', 30);
            $table->string('PIN_CODE', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
