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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('Sno');
            $table->string('Order_id', 15);
            $table->string('Product_id', 15);
            $table->string('Product_name', 40);
            $table->float('Price', 10);
            $table->float('Quantity', 10);

            $table->foreign('Order_id')->references('Order_id')->on('orders');
            $table->foreign('Product_id')->references('Product_id')->on('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
