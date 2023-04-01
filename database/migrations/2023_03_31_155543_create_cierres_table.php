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
        Schema::create('cierres', function (Blueprint $table) {
            $table->id();
            $table->string('blindado');
            $table->string('polarizado');
            $table->string('tipocaja');
            $table->string('tipomotor');
            $table->string('codigofasecolda');
            $table->string('valorfasecolda');
            $table->string('valorcarvalue');
            $table->string('resultado');
            $table->string('gnvc');
            $table->string('tipopintura');
            $table->string('serviciosolicitado');
            $table->string('valoraccesorios');
            $table->text('observacion');
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
            $table->unsignedBigInteger('empresa_id')
            ->nullable()
            ->index();
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresas');
            $table->boolean('activo')->default(1);
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
        Schema::dropIfExists('cierres');
    }
};
