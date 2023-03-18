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
        Schema::create('equipoparts', function (Blueprint $table) {
            $table->id();
            $table->string('clase_vehiculo',45);
            $table->string('name');
            $table->string('marca');
            $table->string('serial');
            $table->string('banco');
            $table->string('pef');
            $table->string('ltoe');
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
        Schema::dropIfExists('equipoparts');
    }
};
