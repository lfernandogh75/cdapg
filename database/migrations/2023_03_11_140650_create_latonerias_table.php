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
        Schema::create('latonerias', function (Blueprint $table) {
            $table->id();
            $table->enum("estado", ["N/A","BUEN ESTADO","ORIGINAL","CAMBIADO","BUENA REPARACION","MAL REPARADO","SUMIDO","BUENA SUSTITUCION","REPARACION REGULAR"]);
            $table->enum("vista", ["IZQUIERDA","DERECHA","POSTERIOR","FRONTAL","BAJA"]);
            $table->text('observaciones');
            $table->unsignedBigInteger('latoneriacontrol_id')
            ->nullable()
            ->index();
            $table->foreign('latoneriacontrol_id')
            ->references('id')
            ->on('latoneriacontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('latoneriapart_id')
            ->nullable()
            ->index();
            $table->foreign('latoneriapart_id')
            ->references('id')
            ->on('latoneriaparts');
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
        Schema::dropIfExists('latonerias');
    }
};
