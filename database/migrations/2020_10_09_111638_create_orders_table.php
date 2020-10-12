<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->foreignId('country_id');
            $table->foreignId('city_id');
            $table->string('state');
            $table->string('post_code')->nullable();
            $table->decimal('subtotal');
            $table->decimal('discount')->nullable();
            $table->string('discount_code')->nullable();
            $table->decimal('tax');
            $table->decimal('total');
            $table->string('payment_method');
            $table->text('comment')->nullable();
            $table->boolean('shipped')->default(0);
            $table->dateTime('shipped_on')->nullable();
            $table->boolean('completed')->default(0);
            $table->dateTime('completed_on')->nullable();
            $table->string('error')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('orders');
    }
}
