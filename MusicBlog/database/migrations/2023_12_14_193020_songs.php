<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Songs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('songs', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('titulo');

            $table->bigInteger('album_id')->unsigned()->nullable();
            $table->bigInteger('gender_id')->unsigned();

            $table->integer('anio');
            $table->longtext('caratula')->nullable();
            $table->longtext('audio')->nullable();
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albums')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete("cascade")->onUpdate('cascade');
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
