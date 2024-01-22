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
            $table->decimal('total_amount', 8, 2)->nullable(); 
            $table->timestamp('order_date')->useCurrent();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();   
            $table->text('cart_id')->nullable();   
            $table->enum('status', ['pending','paid','failed','delivered']);         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
