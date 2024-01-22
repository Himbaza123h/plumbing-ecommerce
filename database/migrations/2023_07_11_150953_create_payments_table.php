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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();  
            $table->timestamp('payment_date')->nullable();
            $table->text('payment_method')->nullable();
            $table->boolean('payed')->default(1);
            $table->string('currency')->nullable();
            $table->string('reference')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->string('street_address')->nullable();
            $table->string('house_address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();  
            $table->string('tx_ref')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
