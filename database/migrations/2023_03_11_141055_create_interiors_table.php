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
        Schema::create('interiors', function (Blueprint $table) {
            $table->id();
            $table->enum("estado", ["N/A","BUEN ESTADO","ORIGINAL","CAMBIADO","BUENA REPARACION","MAL REPARADO","SUMIDO","BUENA SUSTITUCION","REPARACION REGULAR"]);
            $table->text('observaciones');
            $table->unsignedBigInteger('interiorcontrol_id')
            ->nullable()
            ->index();
            $table->foreign('interiorcontrol_id')
            ->references('id')
            ->on('interiorcontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('interiorpart_id')
            ->nullable()
            ->index();
            $table->foreign('interiorpart_id')
            ->references('id')
            ->on('interiorparts');
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
        Schema::dropIfExists('interiors');
    }
};
