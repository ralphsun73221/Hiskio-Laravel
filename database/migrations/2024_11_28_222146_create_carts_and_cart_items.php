<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("carts", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create("cart_items", function (Blueprint $table) {
            $table->id();
            $table->foreignId("cart_id"); // 這個是購物車的 id
            $table->foreignId("product_id"); // 這個是產品的 id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("carts");
        Schema::dropIfExists("cart_items");
    }
};
