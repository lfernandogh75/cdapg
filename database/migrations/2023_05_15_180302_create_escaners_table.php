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
        Schema::create('escaners', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
             $table->string('elemento');
             $table->text('observaciones');
             $table->string('perito');
            $table->unsignedBigInteger('escanercontrol_id')
            ->nullable()
            ->index();
            $table->foreign('escanercontrol_id')
            ->references('id')
            ->on('escanercontrols')
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
        Schema::dropIfExists('escaners');
    }
};
