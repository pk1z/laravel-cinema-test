<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->unsignedInteger('seance_id');
            $table->foreign('seance_id')->references('id')->on('seance');
        });

        Schema::table('seance', function (Blueprint $table) {
            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films');
            $table->unsignedInteger('room_id');
            $table->foreign('room_id')->references('id')->on('room');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->dropForeign(['seance_id']);
        });
        Schema::table('seance', function (Blueprint $table){

            $table->dropForeign(['film_id', 'room_id']);
        });
        //
    }
}
