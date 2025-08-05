<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // Buyer (user who adds to cart)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Product being added
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');

            // Seller (owner of the product)
            $table->foreignId('posted_by')->constrained('users')->onDelete('cascade');

            // Quantity with default 1
            $table->integer('quantity')->default(1);

            // Status with default 'pending'
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
