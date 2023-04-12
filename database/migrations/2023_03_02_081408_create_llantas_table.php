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
        Schema::create('llantas', function (Blueprint $table) {
            $table->id();
            $table->string('perito');
            $table->enum("cambio", ["NO","SI","N/A"]);
            $table->decimal('labrado', 8, 2);
            $table->integer('presion');
            $table->integer('vidautil');
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('llantacontrol_id')
            ->nullable()
            ->index();
            $table->foreign('llantacontrol_id')
            ->references('id')
            ->on('llantacontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('llantapart_id')
            ->nullable()
            ->index();
            $table->foreign('llantapart_id')
            ->references('id')
            ->on('llantaparts');
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
        Schema::dropIfExists('llantas');
    }
};
