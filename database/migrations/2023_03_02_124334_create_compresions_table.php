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
        Schema::create('compresions', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->integer('compresion');
            $table->integer('fuga');
            $table->unsignedBigInteger('compresioncontrol_id')
            ->nullable()
            ->index();
            $table->foreign('compresioncontrol_id')
            ->references('id')
            ->on('compresioncontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('compresionpart_id')
            ->nullable()
            ->index();
            $table->foreign('compresionpart_id')
            ->references('id')
            ->on('compresionparts');
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
        Schema::dropIfExists('compresions');
    }
};
