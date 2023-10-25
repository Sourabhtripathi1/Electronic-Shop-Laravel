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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id('Sno');
            $table->string('User_id', 15);
            $table->string('Product_id', 15);
            $table->string('Product_name', 45);
            $table->foreign('User_id')->references('User_id')->on('customers');
            $table->foreign('Product_id')->references('Product_id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
