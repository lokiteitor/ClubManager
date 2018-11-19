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
            $table->string('email',64)->nullable(false)->unique();
            $table->string('nombre',30)->nullable(false);
            $table->string('ap_paterno',30)->nullable(false);
            $table->string('ap_materno',30)->nullable(false);
            $table->string('direccion',120)->nullable(false);
            $table->string('password',32)->nullable(false);
            $table->string('telefono')->nullable(false);
            $table->enum('empleado',
            array('empleado','administrador','instructor',
            'cliente'))->nullable(false);                
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
