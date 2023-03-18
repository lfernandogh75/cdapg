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
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->string('observacion');
            $table->unsignedBigInteger('fotocontrol_id')
            ->nullable()
            ->index();
            $table->foreign('fotocontrol_id')
            ->references('id')
            ->on('fotocontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('fotopart_id')
            ->nullable()
            ->index();
            $table->foreign('fotopart_id')
            ->references('id')
            ->on('fotoparts');
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
        Schema::dropIfExists('fotos');
    }
};
