<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchased_courses_user_id')->default(0);
            $table->integer('purchased_courses_course_id')->default(0);
            $table->integer('purchased_courses_language_id')->default(0);            
            $table->text('purchased_courses_title');
            $table->text('purchased_courses_slojnost');
            $table->text('purchased_courses_description');
            $table->integer('purchased_courses_count_time')->default(0);
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
        Schema::dropIfExists('purchased_courses');
    }
}
