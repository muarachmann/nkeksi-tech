<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profile_pic')->nullable();
            $table->string('email')->unique();
            $table->string('fullname')->nullable();
            $table->string('profession')->nullable();
            $table->string('site')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
