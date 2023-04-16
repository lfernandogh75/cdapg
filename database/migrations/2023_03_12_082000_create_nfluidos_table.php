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
        Schema::create('nfluidos', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["N/A","OPTIMO","BAJO","ALTO"]);
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('nfluidocontrol_id')
            ->nullable()
            ->index();
            $table->foreign('nfluidocontrol_id')
            ->references('id')
            ->on('nfluidocontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('fluidopart_id')
            ->nullable()
            ->index();
            $table->foreign('fluidopart_id')
            ->references('id')
            ->on('fluidoparts');
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
        Schema::dropIfExists('nfluidos');
    }
};
