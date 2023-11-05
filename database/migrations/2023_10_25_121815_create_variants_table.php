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
        Schema::create('variants', function (Blueprint $table) {
            $table->string("variant_id", 15)->primary();
            $table->string("Product_id", 15);
            $table->float('Stock', 10);
            $table->string('Color', 30);
            $table->string('Picture', 150);
            $table->float('Price', 10);

            $table->foreign('Product_id')->references('Product_id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
