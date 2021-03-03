<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shopname');
            $table->string('slug');
            $table->string('shoplogo')->default('public/uploads/shoplogo/default.png');
            $table->string('shopbanner')->default('public/uploads/shopbanner/default.jpg');
            $table->integer('sellerphone')->unique();
            $table->integer('sellerphone2')->unique()->nullable();
            $table->string('selleremail')->unique();
            $table->string('contperson')->nullable();
            $table->integer('sellercash')->nullable();
            $table->integer('sellerwithdraw')->nullable();
            $table->string('selleraddress')->nullable();
            $table->string('sellerwebsite')->nullable();
            $table->string('sellerbankaccount')->nullable();
            $table->string('sellerbankname')->nullable();
            $table->string('sellerbankbranch')->nullable();
            $table->string('sellerroutingno')->nullable();
            $table->tinyInteger('publishproduct')->nullable();
            $table->tinyInteger('commisiontype')->nullable();
            $table->integer('commision')->nullable();
            $table->tinyInteger('featurevandor')->nullable();
            $table->tinyInteger('agree');
            $table->integer('verify')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('sellers');
    }
}
