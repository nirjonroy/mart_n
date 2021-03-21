<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblMasonaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_masonary', function (Blueprint $table) {
             $table->increments('masonary_id');
            $table->string('masonary_image');
            $table->string('masonary_link');
            $table->string('masonary_name');
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
        Schema::dropIfExists('tbl_masonary');
    }
}
