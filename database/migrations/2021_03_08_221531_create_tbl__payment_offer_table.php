<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPaymentOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_PaymentOffer', function (Blueprint $table) {
            $table->increments('payment_offer_id');
            $table->string('payment_offer_logo');
            $table->string('payment_offer_short_description');
            $table->string('payment_offer');
            $table->string('publicatio_status');
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
        Schema::dropIfExists('tbl_PaymentOffer');
    }
}
