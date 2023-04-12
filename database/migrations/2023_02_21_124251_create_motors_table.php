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
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["Bueno","Malo","Regular","N/A"]);
            $table->enum("tipo", ["Original","Genérica","N/A"]);
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('motorcontrol_id')
            ->nullable()
            ->index();
            $table->foreign('motorcontrol_id')
            ->references('id')
            ->on('motorcontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('motorpark_id')
            ->nullable()
            ->index();
            $table->foreign('motorpark_id')
            ->references('id')
            ->on('motorparks');
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
        Schema::dropIfExists('motors');
    }
};
