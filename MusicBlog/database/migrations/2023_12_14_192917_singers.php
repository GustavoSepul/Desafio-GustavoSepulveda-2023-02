<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Singers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('singers', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('anio_nacimiento');
            $table->bigInteger('pais_id')->unsigned();
            $table->longtext('imagen')->nullable();
            $table->timestamps();
            $table->foreign('pais_id')->references('id')->on('countries')->onDelete("cascade")->onUpdate('cascade');
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
