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
        Schema::create('exteriors', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["Bueno","Malo","Regular","N/A"]);
            $table->enum("tipo", ["Original","Genérica","N/A"]);
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('exteriorcontrol_id')
            ->nullable()
            ->index();
            $table->foreign('exteriorcontrol_id')
            ->references('id')
            ->on('exteriorcontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('exteriorpart_id')
            ->nullable()
            ->index();
            $table->foreign('exteriorpart_id')
            ->references('id')
            ->on('exteriorparts');
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
        Schema::dropIfExists('exteriors');
    }
};
