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
        Schema::create('vluces', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["N/A","BUENA","MALA","ORIGINAL","CAMBIADO"]);
            $table->text('observaciones');
            $table->unsignedBigInteger('vlucescontrol_id')
            ->nullable()
            ->index();
            $table->foreign('vlucescontrol_id')
            ->references('id')
            ->on('vlucescontrols')
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
        Schema::dropIfExists('vluces');
    }
};
