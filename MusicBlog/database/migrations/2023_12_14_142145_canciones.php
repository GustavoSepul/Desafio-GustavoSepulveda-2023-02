<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Canciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('canciones', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('titulo');

            $table->bigInteger('album_id')->unsigned();
            $table->bigInteger('artista_id')->unsigned();
            $table->bigInteger('genero_id')->unsigned();

            $table->time('duracion');
            $table->integer('anio');
            $table->longtext('caratula')->nullable();
            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('albumes')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete("cascade")->onUpdate('cascade');
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
