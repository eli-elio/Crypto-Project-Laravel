<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyCryptocurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_cryptocurrencies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('symbol');
            $table->double('price');
            $table->integer('amount');
            $table->double('price_payed');
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
        Schema::dropIfExists('my_cryptocurrencies');
    }
}
