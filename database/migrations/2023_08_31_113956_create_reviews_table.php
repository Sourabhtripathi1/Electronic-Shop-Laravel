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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('Review_no');
            $table->string('User_id', 15);
            $table->string('Product_id', 15);
            $table->string('content', 60);
            $table->date('Review_Date');

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
        Schema::dropIfExists('reviews');
    }
};
