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
        Schema::create('vidrios', function (Blueprint $table) {
            $table->id();
            $table->enum("estado", ["N/A","BUEN ESTADO","ORIGINAL","CAMBIADO","BUENA REPARACION","MAL REPARADO","PICADO","BUENA SUSTITUCION","REPARACION REGULAR"]);
            $table->text('observaciones');
            $table->unsignedBigInteger('vidriocontrol_id')
            ->nullable()
            ->index();
            $table->foreign('vidriocontrol_id')
            ->references('id')
            ->on('vidriocontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('vidriopart_id')
            ->nullable()
            ->index();
            $table->foreign('vidriopart_id')
            ->references('id')
            ->on('vidrioparts');
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
        Schema::dropIfExists('vidrios');
    }
};
