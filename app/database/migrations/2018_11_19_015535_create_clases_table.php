<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_actividad')->nullable(false);
            $table->time('hora_inicio')->nullable(false);
            $table->time('hora_fin')->nullable(false);
            $table->enum('dia_semana',['L','M','Mi','J','V','S','D'])->nullable(false);
            $table->string('email',32)->nullable(false);
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
        Schema::dropIfExists('clases');
    }
}
