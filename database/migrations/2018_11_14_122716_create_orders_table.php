<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
             $table->increments('orderIdPrimary');
            $table->integer('customerId');
            $table->string('ordertrack');
            $table->integer('orderTotal');
            $table->integer('cshippingfee')->nullable();
            $table->integer('cdiscount')->nullable();
            $table->string('offertype')->nullable();
            $table->integer('totalproductpoint')->nullable();
            $table->integer('usemypoint')->nullable();
            $table->integer('additionalshipping')->usecouponcode();
            $table->integer('shippingId');
            $table->integer('orderSubtotal');
            $table->string('orderStatus')->default('0');
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
