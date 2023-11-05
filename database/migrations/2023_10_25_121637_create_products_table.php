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
        Schema::create('products', function (Blueprint $table) {
            $table->string('Product_id', 15)->primary();
            $table->string('Product_name', 100);
            $table->string('Material', 50);
            $table->string('Dimention', 20);
            $table->string('Brand', 15);
            $table->string('Category', 15);
            $table->foreign('Category')->references('Category_id')->on('categories');

            $table->foreign('Brand')->references('Brand_id')->on('brands');

            $table->string('Description', 2500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
