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
        Schema::create('luzs', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->decimal('intensidad', 8, 2);
            $table->decimal('minimo', 8, 2);
            $table->string('unidad');
            $table->decimal('inclinacion', 8, 2);
            $table->string('rango');
            $table->unsignedBigInteger('luzcontrol_id')
            ->nullable()
            ->index();
            $table->foreign('luzcontrol_id')
            ->references('id')
            ->on('luzcontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('luzpart_id')
            ->nullable()
            ->index();
            $table->foreign('luzpart_id')
            ->references('id')
            ->on('luzparts');
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
        Schema::dropIfExists('luzs');
    }
};
