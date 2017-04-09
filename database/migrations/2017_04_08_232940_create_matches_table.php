<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('team_a_id')->unsigned();
            $table->foreign('team_a_id')->references('id')->on('teams');
            $table->integer('team_b_id')->unsigned();
            $table->foreign('team_b_id')->references('id')->on('teams');

            $table->integer('team_a_goals');
            $table->integer('team_b_goals');

            $table->integer('team_win_id')->unsigned();
            $table->foreign('team_win_id')->references('id')->on('teams');

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
        Schema::dropIfExists('matches');
    }
}
