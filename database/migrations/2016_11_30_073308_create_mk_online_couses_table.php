<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMkOnlineCousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mk_online_couses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('mk_onlines_title');
            $table->text('mk_onlines_slojnost');
            $table->text('mk_onlines_description');
            $table->integer('mk_onlines_language_id')->default(0);
            $table->integer('mk_onlines_price')->default(0);
            $table->integer('mk_onlines_count_time')->default(0);
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
        Schema::dropIfExists('mk_online_couses');
    }
}
