<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('productcat');
            $table->integer('productsubcat');
            $table->integer('productchildcat')->nullable();
            $table->integer('productbrand')->nullable();
            $table->text('productname');
            $table->text('slug');
            $table->integer('productdiscount')->nullable();
            $table->integer('productnewprice');
            $table->integer('productoldprice')->nullable();
            $table->integer('productpoint')->nullable();
            $table->string('productcode')->nullable();
            $table->integer('additionalshipping')->nullable();
            $table->string('featureproductdate')->nullable();
            $table->tinyInteger('productstyle')->nullable();
            $table->longText('productdetails');
            $table->longText('productdetails2')->nullable();
            $table->integer('productquantity');
            $table->integer('sellerid');
            $table->tinyInteger('request');
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
        Schema::dropIfExists('products');
    }
}
