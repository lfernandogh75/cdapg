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
        Schema::create('frenos', function (Blueprint $table) {
            $table->id();
            $table->decimal('eficiencia', 8, 2);
            $table->decimal('minimo', 8, 2);
            $table->integer('fuerza');
            $table->integer('peso');
            $table->string('unidad');
            $table->unsignedBigInteger('frenocontrol_id')
            ->nullable()
            ->index();
            $table->foreign('frenocontrol_id')
            ->references('id')
            ->on('frenocontrols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('frenopart_id')
            ->nullable()
            ->index();
            $table->foreign('frenopart_id')
            ->references('id')
            ->on('frenoparts');
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
        Schema::dropIfExists('frenos');
    }
};
