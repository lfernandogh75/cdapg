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
        Schema::create('sws', function (Blueprint $table) {
            $table->id();
           // $table->string('version');
           // $table->string('dispositivo');
            $table->unsignedBigInteger('swcontrol_id')
            ->nullable()
            ->index();
            $table->foreign('swcontrol_id')
            ->references('id')
            ->on('swcontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('swpart_id')
            ->nullable()
            ->index();
            $table->foreign('swpart_id')
            ->references('id')
            ->on('swparts');
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
        Schema::dropIfExists('sws');
    }
};
