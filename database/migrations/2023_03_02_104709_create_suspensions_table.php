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
        Schema::create('suspensions', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("cambio", ["NO","SI","N/A"]);
            $table->enum("estado", ["N/A","BUEN ESTADO","ORIGINAL","CAMBIADO","BUENA REPARACION","MAL REPARADO","SUMIDO","BUENA SUSTITUCION","REPARACION REGULAR"]);
            $table->text('observaciones')->nullable();
            $table->string('porcentaje')->nullable();
            $table->unsignedBigInteger('suspensioncontrol_id')
            ->nullable()
            ->index();
            $table->foreign('suspensioncontrol_id')
            ->references('id')
            ->on('suspensioncontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('suspensionpart_id')
            ->nullable()
            ->index();
            $table->foreign('suspensionpart_id')
            ->references('id')
            ->on('suspensionparts');
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
        Schema::dropIfExists('suspensions');
    }
};
