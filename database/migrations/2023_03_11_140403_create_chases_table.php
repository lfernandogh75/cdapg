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
        Schema::create('chases', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["N/A","ORIGINAL","CAMBIADO","BUENA REPARACION","MAL REPARADO","SUMIDO","BUENA SUSTITUCION","REPARACION REGULAR"]);
            $table->text('observaciones');
            $table->unsignedBigInteger('chasiscontrol_id')
            ->nullable()
            ->index();
            $table->foreign('chasiscontrol_id')
            ->references('id')
            ->on('chasiscontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('chasispart_id')
            ->nullable()
            ->index();
            $table->foreign('chasispart_id')
            ->references('id')
            ->on('chasisparts');
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
        Schema::dropIfExists('chases');
    }
};
