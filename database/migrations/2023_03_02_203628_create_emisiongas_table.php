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
        Schema::create('emisiongas', function (Blueprint $table) {
            $table->id();
           
            $table->string('conorma')->nullable();
            $table->string('covlr')->nullable();
            $table->string('counidad')->nullable();
            $table->string('codosnorma')->nullable();
            $table->string('codosvlr')->nullable();
            $table->string('codosunidad')->nullable();
            $table->string('oxnorma')->nullable();
            $table->string('oxvlr')->nullable();
            $table->string('oxunidad')->nullable();
            $table->string('hcnorma')->nullable();
            $table->string('hcvlr')->nullable();
            $table->string('hcunidad')->nullable();
            $table->string('nonorma')->nullable();
            $table->string('novlr')->nullable();
            $table->string('nounidad')->nullable();
            $table->string('conormac')->nullable();
            $table->string('covlrc')->nullable();
            $table->string('counidadc')->nullable();
            $table->string('codosnormac')->nullable();
            $table->string('codosvlrc')->nullable();
            $table->string('codosunidadc')->nullable();
            $table->string('oxnormac')->nullable();
            $table->string('oxvlrc')->nullable();
            $table->string('oxunidadc')->nullable();
            $table->string('hcnormac')->nullable();
            $table->string('hcvlrc')->nullable();
            $table->string('hcunidadc')->nullable();
            $table->string('nonormac')->nullable();
            $table->string('novlrc')->nullable();
            $table->string('nounidadc')->nullable();
            $table->string('opacidadcuno')->nullable();
            $table->string('opacidadcunou')->nullable();
            $table->string('opacidadcdos')->nullable();
            $table->string('opacidadcdosu')->nullable();
            $table->string('opacidadctres')->nullable();
            $table->string('opacidadctresu')->nullable();
            $table->string('opacidadccuatro')->nullable();
            $table->string('opacidadccuatrou')->nullable();
            $table->string('gobernadacuno')->nullable();
            $table->string('gobernadacunou')->nullable();
            $table->string('gobernadacdos')->nullable();
            $table->string('gobernadacdosu')->nullable();
            $table->string('gobernadactres')->nullable();
            $table->string('gobernadactresu')->nullable();
            $table->string('gobernadaccuatro')->nullable();
            $table->string('gobernadaccuatrou')->nullable();
            $table->string('unidad')->nullable();
            $table->string('norma')->nullable();
            $table->string('resultado')->nullable();
            $table->unsignedBigInteger('peritaje_id')->unique();
            $table->foreign('peritaje_id')
            ->references('id')
            ->on('peritajes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')
            ->index();
            $table->foreign('user_id')
            ->references('id')
            ->on('users'); 
            $table->boolean('activo')->default(1);  
            $table->text('observacion');
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
        Schema::dropIfExists('emisiongas');
    }
};
