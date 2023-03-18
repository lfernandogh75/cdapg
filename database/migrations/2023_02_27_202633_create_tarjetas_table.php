<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id(); 
            $table->string('placa',10);
            $table->string('clase_vehiculo',45);
            $table->integer('modelo');
            $table->integer('cilindrada');
            $table->integer('capacidad');
            $table->string('numero_motor');
            $table->string('numero_serie');
            $table->string('numero_vin');
            $table->string('numero_chasis');
            $table->string('nacionalidad');
           // $table->string('codigo_fasecolda')->nullable();
           // $table->integer('valor_fasecolda')->nullable();
           // $table->integer('valor_sugerido')->nullable();
          //  $table->integer('valor_total_accesorios')->nullable();
           // $table->integer('km');
            $table->integer('potencia');
           // $table->string('puertas')->nullable();
            $table->date('fecha_matricula');
            $table->string('propietario');
            $table->string('identificacion_propietario');
            $table->unsignedBigInteger('peritaje_id')->unique();
            $table->foreign('peritaje_id')
            ->references('id')
            ->on('peritajes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')
            ->index();
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            $table->unsignedBigInteger('marca_id')
            ->index();
            $table->foreign('marca_id')
            ->references('id')
            ->on('marcas');
            $table->unsignedBigInteger('linea_id')
            ->index();
            $table->foreign('linea_id')
            ->references('id')
            ->on('lineas');
            $table->unsignedBigInteger('transmision_id')
            ->index();
            $table->foreign('transmision_id')
            ->references('id')
            ->on('transmisions');
            $table->unsignedBigInteger('carroceria_id')
            ->index();
            $table->foreign('carroceria_id')
            ->references('id')
            ->on('carrocerias');
            $table->unsignedBigInteger('combustible_id')
            ->index();
            $table->foreign('combustible_id')
            ->references('id')
            ->on('combustibles');
            $table->unsignedBigInteger('color_id')
            ->index();
            $table->foreign('color_id')
            ->references('id')
            ->on('colors');
            $table->unsignedBigInteger('servicio_id')
            ->index();
            $table->foreign('servicio_id')
            ->references('id')
            ->on('servicios');
            $table->boolean('activo')->default(1);
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
        Schema::dropIfExists('tarjetas');
    }
};
