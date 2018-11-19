<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('email',32)->nullable(false)->unique();
            $table->string('nombre',30)->nullable(false);
            $table->string('ap_paterno',30)->nullable(false);
            $table->string('ap_materno',30)->nullable(false);
            $table->string('direccion',60)->nullable(false);
            $table->string('password',16)->nullable(false);
            $table->string('telefono',12)->nullable(false);
            $table->enum('empleado',array('empleado','administrador','cliente'))->nullable(false);                
            $table->timestamps();
            $table->primary('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
