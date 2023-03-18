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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
           /* $table->string('marca');
            $table->string('serial');
            $table->string('banco');
            $table->string('pef');
            $table->string('ltoe');*/
            $table->unsignedBigInteger('equipocontrol_id')
            ->nullable()
            ->index();
            $table->foreign('equipocontrol_id')
            ->references('id')
            ->on('equipocontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('equipopart_id')
            ->nullable()
            ->index();
            $table->foreign('equipopart_id')
            ->references('id')
            ->on('equipoparts');
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
        Schema::dropIfExists('equipos');
    }
};
