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
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();

        $table->foreignId('order_id')
            ->constrained()
            ->cascadeOnDelete();

        // Produk boleh dihapus kemudian, tetapi riwayat
        // nama dan harga pada transaksi tetap tersimpan.

        $table->foreignId('product_id')
            ->nullable()
            ->constrained('products')
            ->nullOnDelete();

        $table->string('product_name');
        $table->unsignedInteger('quantity');
        $table->unsignedInteger('weight');
        $table->decimal('price', 12, 2);
        $table->decimal('subtotal', 12, 2);

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('order_items');
}
};