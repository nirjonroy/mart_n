<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdershippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordershippings', function (Blueprint $table) {
            $table->increments('id');$table->string('name');
            $table->string('phone');
            $table->string('district');
            $table->string('area');
            $table->string('stateaddress');
            $table->string('customerid');
            $table->text('houseaddress')->nullable();
            $table->text('fulladdress')->nullable();
            $table->text('zipcode')->nullable();
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
        Schema::dropIfExists('ordershippings');
    }
}
