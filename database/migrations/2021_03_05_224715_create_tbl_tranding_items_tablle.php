<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblTrandingItemsTablle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tranding_items', function (Blueprint $table) {
             $table->increments('tranding_id');
            $table->string('tranding_product_name');
            $table->string('tranding_product_oldprice');
            $table->string('tranding_product_name_new_price');
            $table->string('tranding_product_image');
            $table->integer('publication_status');
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
        Schema::dropIfExists('tbl_tranding_items');
    }
}
