<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('sv23810310118_products', function (Blueprint $table) {
        $table->id();

        $table->foreignId('category_id')
              ->constrained('sv23810310118_categories')
              ->onDelete('cascade');

        $table->string('name');
        $table->string('slug');
        $table->text('description')->nullable();

        $table->decimal('price', 10, 2);
        $table->integer('stock_quantity');

        $table->string('image_path')->nullable();

        $table->enum('status', ['draft', 'published', 'out_of_stock']);

        $table->integer('discount_percent')->default(0);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sv23810310118_products');
    }
};
