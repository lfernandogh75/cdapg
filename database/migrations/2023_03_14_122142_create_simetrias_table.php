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
        Schema::create('simetrias', function (Blueprint $table) {
            $table->id();
            $table->integer('sderecho');
            $table->integer('smedio');
            $table->integer('sizquierdo');
            $table->integer('iderecho');
            $table->integer('imedio');
            $table->integer('iizquierdo');
            $table->unsignedBigInteger('peritaje_id')->unique();
            $table->foreign('peritaje_id')
            ->references('id')
            ->on('peritajes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')
            ->index();
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            $table->boolean('activo')->default(1);
            $table->text('observacion');
            $table->integer('nivelaprobado');
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
        Schema::dropIfExists('simetrias');
    }
};
