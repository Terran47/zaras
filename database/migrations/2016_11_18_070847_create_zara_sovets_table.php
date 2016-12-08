<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZaraSovetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zara_sovets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('zara_sovets_img');
            $table->text('zara_sovets_name');
            $table->integer('zara_sovets_price');
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
        Schema::dropIfExists('zara_sovets');
    }
}
