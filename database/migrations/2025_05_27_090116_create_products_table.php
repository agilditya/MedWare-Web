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
            $table->string('image')->nullable();
            $table->string('productName');
            $table->string('composition')->nullable();
            $table->string('sideEffects')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('price');
            $table->string('code', 6)->unique();
            $table->string('description')->nullable();
            $table->date('expired'); 
            $table->string('category');
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
