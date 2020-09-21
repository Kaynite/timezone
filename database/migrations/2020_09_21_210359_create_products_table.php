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
            $table->string('photo');
            $table->string('content');

            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->foreignId('trademark_id')->nullable();
            $table->foreign('trademark_id')->references('id')->on('trademarks')->onDelete('cascade');

            $table->foreignId('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');

            $table->foreignId('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->integer('weight')->default(0);
            $table->foreignId('weight_id')->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');

            $table->foreignId('size_id')->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');

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
