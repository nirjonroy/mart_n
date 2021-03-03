<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentsaves', function (Blueprint $table) {
            $table->increments('paymentIdPrimary');
            $table->integer('orderId');
            $table->string('paymentType');
            $table->text('cPaynumber')->nullable();
            $table->text('cPaytrxid')->nullable();
            $table->string('paymentStatus')->default('pending');
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
        Schema::dropIfExists('paymentsaves');
    }
}
