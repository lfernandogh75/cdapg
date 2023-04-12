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
        Schema::create('pinturas', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["N/A","ORIGINAL","BIEN REPINTADO","RAYON","IMPUREZAS","MAL REPINTADO","PIEL DE NARANJA",]);
            $table->enum("vista", ["IZQUIERDA","DERECHA","POSTERIOR","FRONTAL","BAJA"]);
            $table->text('observaciones');
            $table->unsignedBigInteger('pinturacontrol_id')
            ->nullable()
            ->index();
            $table->foreign('pinturacontrol_id')
            ->references('id')
            ->on('pinturacontrols')
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
        Schema::dropIfExists('pinturas');
    }
};
