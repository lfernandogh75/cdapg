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
        Schema::create('bajas', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["N/A","BUEN ESTADO","ORIGINAL","CAMBIADO","BUENA REPARACION","MAL REPARADO","SUMIDO","BUENA SUSTITUCION","REPARACION REGULAR"]);
            $table->text('observaciones');
            $table->unsignedBigInteger('bajacontrol_id')
            ->nullable()
            ->index();
            $table->foreign('bajacontrol_id')
            ->references('id')
            ->on('bajacontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('bajapart_id')
            ->nullable()
            ->index();
            $table->foreign('bajapart_id')
            ->references('id')
            ->on('bajaparts');
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
        Schema::dropIfExists('bajas');
    }
};
