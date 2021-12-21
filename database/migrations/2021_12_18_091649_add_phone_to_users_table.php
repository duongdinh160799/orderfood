<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('phone')->after('status')->default('');
            $table->string('address')->after('phone')->default('');
            $table->string('id_number')->after('address')->default('');
            $table->integer('gender')->after('id_number')->default(0);
            $table->date('birthday')->after('gender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //

        });
    }
}
