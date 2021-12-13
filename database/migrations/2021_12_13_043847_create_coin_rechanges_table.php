<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinRechangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_rechanges', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('coin');
            $table->string('code');
            $table->integer('status')->comment('1: gui yeu cau - 2: xac nhan - 3: tư choi');
            $table->integer('payment_type')->comment('sẽ update sau nếu có liên kết nhiều ví');
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
        Schema::dropIfExists('coin_rechanges');
    }
}
