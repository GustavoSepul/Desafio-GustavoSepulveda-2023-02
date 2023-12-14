<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SingersSongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('singers_songs', function (Blueprint $table) {
            $table->bigInteger('singer_id')->unsigned();
            $table->bigInteger('song_id')->unsigned();
            $table->primary(['singer_id','song_id']);

            $table->foreign('singer_id')->references('id')->on('singers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
