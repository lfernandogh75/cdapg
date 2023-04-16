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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('ruta');
            $table->string('observacion');
            $table->string('nombre');
            $table->string('perito');
            $table->unsignedBigInteger('archivocontrol_id')
            ->nullable()
            ->index();
            $table->foreign('archivocontrol_id')
            ->references('id')
            ->on('archivocontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('archivos');
    }
};
