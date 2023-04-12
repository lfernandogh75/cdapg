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
        Schema::create('estructuras', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["N/A","ORIGINAL","CAMBIADO","BUENA REPARACION","MAL REPARADO","SUMIDO","BUENA SUSTITUCION","REPARACION REGULAR"]);
            $table->enum("vista", ["IZQUIERDA","DERECHA","POSTERIOR","FRONTAL","BAJA"]);
            $table->text('observaciones');
            $table->unsignedBigInteger('estructuracontrol_id')
            ->nullable()
            ->index();
            $table->foreign('estructuracontrol_id')
            ->references('id')
            ->on('estructuracontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('estructurapart_id')
            ->nullable()
            ->index();
            $table->foreign('estructurapart_id')
            ->references('id')
            ->on('estructuraparts');
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
        Schema::dropIfExists('estructuras');
    }
};
