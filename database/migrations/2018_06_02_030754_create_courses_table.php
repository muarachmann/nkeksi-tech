<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('course_image');
            $table->integer('instructor');
            $table->longText('week_1')->nullable();
            $table->longText('week_2')->nullable();
            $table->longText('week_3')->nullable();
            $table->longText('week_4')->nullable();
            $table->longText('week_5')->nullable();
            $table->longText('week_6')->nullable();
            $table->longText('week_7')->nullable();
            $table->longText('week_8')->nullable();
            $table->longText('week_9')->nullable();
            $table->longText('week_10')->nullable();
            $table->longText('week_11')->nullable();
            $table->longText('week_12')->nullable();
            $table->dateTime('launch_date');
            $table->dateTime('expire_date');
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
        Schema::dropIfExists('courses');
    }
}
