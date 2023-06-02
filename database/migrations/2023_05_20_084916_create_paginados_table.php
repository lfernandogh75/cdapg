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
        Schema::create('paginados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('activo')->default(0);
            $table->unsignedBigInteger('valor')->default(0);
            $table->unsignedBigInteger('paginadocontrol_id')
           ->nullable()
           ->index();
           $table->foreign('paginadocontrol_id')
           ->references('id')
           ->on('paginadocontrols')
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
        Schema::dropIfExists('paginados');
    }
};
