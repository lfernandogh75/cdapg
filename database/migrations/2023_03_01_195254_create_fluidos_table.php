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
        Schema::create('fluidos', function (Blueprint $table) {
            $table->id();
            $table->enum("estado", ["NO","SI","N/A"]);
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('fluidocontrol_id')
            ->nullable()
            ->index();
            $table->foreign('fluidocontrol_id')
            ->references('id')
            ->on('fluidocontrols')
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
        Schema::dropIfExists('fluidos');
    }
};
