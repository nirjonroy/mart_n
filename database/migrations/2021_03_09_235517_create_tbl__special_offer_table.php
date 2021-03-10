<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSpecialOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_SpecialOffer', function (Blueprint $table) {
            $table->increments('special_offer_id');
            $table->string('special_offer_date');
            $table->string('special_offer_discount');
            $table->string('special_offer');
            $table->string('special_offer_logot');
            $table->string('publication_status');
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
        Schema::dropIfExists('tbl_SpecialOffer');
    }
}
