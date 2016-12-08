<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtziviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otzivies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('otzivies_user_id')->default(0);
            $table->integer('otzivies_languages_id')->default(0);
            $table->text('otzivies_user_name');
            $table->text('otziv');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otzivies');
    }
}
