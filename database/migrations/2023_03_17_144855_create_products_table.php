<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
       
     */
     // product
        // 1.id
        // 2.photo
        // 3.product_name
        // 4.size
        // 5.price
        // 6.discount
        // 7.Qty
        // 8.user_id    (forien key)
        // 9.created_at
        // 10.updated_at
        // 11.color
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('prodct_name');
            $table->string('size');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('Qty');
            $table->integer('user_id');
            $table->string('color');
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
