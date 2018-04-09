<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('email');
            $table->string('discord');
            $table->text('textInfo')->nullable();
            $table->string('transactionID')->nullable();
            $table->integer('menu');
            $table->integer('status');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_requests');
    }
}
