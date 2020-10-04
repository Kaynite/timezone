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
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('content');

            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->foreignId('trademark_id')->nullable();
            $table->foreign('trademark_id')->references('id')->on('trademarks')->onDelete('set null');

            $table->foreignId('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('set null');

            $table->foreignId('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');

            $table->foreignId('image_id')->nullable();

            $table->integer('weight')->nullable();
            $table->foreignId('weight_id')->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('set null');

            $table->string('size')->nullable();
            $table->foreignId('size_id')->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('set null');

            $table->integer('stock')->default(0);
            $table->date('stock_starts_at')->nullable();
            $table->date('stock_ends_at')->nullable();

            $table->decimal('offer_price')->default(0);
            $table->date('offer_starts_at')->nullable();
            $table->date('offer_ends_at')->nullable();

            $table->text('other_data')->nullable();

            $table->enum('status', ['rejected', 'pending', 'accepted'])->default('pending');
            $table->text('rejection_reason')->nullable();

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
