<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner');
            $table->string('identifier');
            $table->string('first_name');
            $table->string('last_name');
            // $table->string('email')->unique();
            $table->string('address');
            $table->string('post_code')->unique();
            $table->string('country');
            $table->boolean('paid');
            $table->boolean('recieved');
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
        Schema::drop('checkouts');
    }
}
