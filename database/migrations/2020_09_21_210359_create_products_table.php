<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // TODO: Add Slug to products and categories
            // TODO: Add Views to products
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('overview')->nullable();

            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('trademark_id')->nullable();
            $table->foreign('trademark_id')->references('id')->on('trademarks')->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('image_id')->nullable();

            $table->integer('weight')->nullable();
            $table->foreignId('weight_id')->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onUpdate('cascade')->onDelete('set null');

            $table->string('size')->nullable();
            $table->foreignId('size_id')->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onUpdate('cascade')->onDelete('set null');

            $table->integer('stock')->default(0);
            $table->date('stock_starts_at')->nullable();
            $table->date('stock_ends_at')->nullable();

            $table->decimal('offer_price')->default(0)->nullable();
            $table->date('offer_starts_at')->nullable();
            $table->date('offer_ends_at')->nullable();

            $table->decimal('price')->default(0);
            
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
