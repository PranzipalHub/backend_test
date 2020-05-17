<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema
};

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->text('overview')->nullable();
            $table->unsignedDecimal('price', 10, 2)->nullable();
            $table->unsignedDecimal('sale_price', 10, 2)->nullable();
            $table->boolean('show_on_shop')
                ->index()
                ->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
