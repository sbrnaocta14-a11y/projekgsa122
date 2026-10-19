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
        $table->id();


        $table->foreignId('user_id')
            ->constrained()
            ->restrictOnDelete();

        $table->string('order_number')->unique();
        $table->string('customer_name');
        $table->string('customer_email');
        $table->string('phone', 30);
        $table->text('shipping_address');

        $table->string('payment_method'); 
        // bank_transfer atau qris

        $table->decimal('total', 12, 2);

        $table->string('payment_status')
            ->default('pending');
        // pending, awaiting_verification, paid, rejected

        $table->string('order_status')
            ->default('pending');
        // pending, processing, shipped, completed, cancelled

        $table->string('payment_proof')->nullable();
        $table->text('payment_note')->nullable();
        $table->timestamp('paid_at')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('orders');
}
};
