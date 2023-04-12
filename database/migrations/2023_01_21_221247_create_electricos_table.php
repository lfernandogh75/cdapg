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
        Schema::create('electricos', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("estado", ["Bueno","Malo","Regular","N/A"]);
            $table->enum("tipo", ["Original","Genérica","N/A"]);
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('electricocontrol_id')
            ->nullable()
            ->index();
            $table->foreign('electricocontrol_id')
            ->references('id')
            ->on('electricocontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('electricalpart_id')
            ->nullable()
            ->index();
            $table->foreign('electricalpart_id')
            ->references('id')
            ->on('electricalparts');
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
        Schema::dropIfExists('electricos');
    }
};
