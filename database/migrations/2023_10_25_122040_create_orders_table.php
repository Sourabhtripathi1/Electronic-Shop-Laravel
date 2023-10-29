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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('Order_id', 15)->primary();
            $table->date('Order_Date');
            $table->string('User_id', 15);
            $table->string('Username', 30);
            $table->string('Hno', 10);
            $table->string('Address', 70);
            $table->string('Payment_Method', 15);
            $table->string('contact', 15);
            $table->float('PINCODE', 10);

            $table->foreign('User_id')->references('User_id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
