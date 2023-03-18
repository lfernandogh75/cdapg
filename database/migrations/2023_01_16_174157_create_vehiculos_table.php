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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa',10);
          /*  $table->string('marca',45);
            $table->string('linea',45);
            $table->string('transmision',45);
            $table->string('clase_vehiculo',45);
            $table->string('tipo_carroceria',45);
            $table->string('combustible',45);
            $table->string('color',45);
            $table->string('servicio',45);
            $table->integer('modelo');
            $table->integer('cilindrada');
            $table->integer('capacidad');
            $table->string('numero_motor');
            $table->string('numero_serie');
            $table->string('numero_vin');
            $table->string('numero_chasis');
            $table->string('nacionalidad');
            $table->string('codigo_fasecolda')->nullable();
            $table->integer('valor_fasecolda')->nullable();
            $table->integer('valor_sugerido')->nullable();
            $table->integer('valor_total_accesorios')->nullable();
            $table->integer('km');
            $table->integer('potencia');
            $table->string('puertas')->nullable();
            $table->date('fecha_matricula');
            $table->string('propietario');
            $table->string('identificacion_propietario');*/
            $table->string('clase_vehiculo',45);
            $table->string('solicitante');
            $table->string('tipoidentificacion');
            $table->string('numeroidentificacion');
            $table->string('telefono');
            $table->string('email');
            $table->integer('km');
            $table->unsignedBigInteger('peritaje_id')->unique();
            $table->foreign('peritaje_id')
            ->references('id')
            ->on('peritajes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('vehiculos');
    }
};
