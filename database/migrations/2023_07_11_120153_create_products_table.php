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
            $table->id(); 
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('quantity_available')->nullable();
            $table->text('cover')->nullable();
            $table->text('images')->nullable();
            $table->text('details')->nullable();
            $table->text('currency')->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();  
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
