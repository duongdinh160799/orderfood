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
            $table->integer('user_id');
            $table->string('address')->default('');
            $table->string('description')->default('');
            $table->integer('payment_type')->default(0)->comment('1-Cash On Delivery, 2-Wallet');
            $table->integer('total')->default(0);
            $table->integer('status')->default(0)->comment('0-Yet to be delivered, 1-Shipping, 2-Done, 3-Cancel');
            $table->integer('deleted')->default(0)->comment('0 - not delete , 1 - delete');
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
