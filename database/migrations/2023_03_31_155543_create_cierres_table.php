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
        Schema::create('cierres', function (Blueprint $table) {
            $table->id();
            $table->string('blindado')->nullable();
            $table->string('polarizado')->nullable();
            $table->string('tipocaja')->nullable();
            $table->string('tipomotor')->nullable();
            $table->string('codigofasecolda')->nullable();
            $table->string('valorfasecolda')->nullable();
            $table->string('valorcarvalue')->nullable();
            $table->string('resultado')->nullable();
            $table->string('gnvc')->nullable();
            $table->string('tipopintura')->nullable();
            $table->string('serviciosolicitado')->nullable();
            $table->string('valoraccesorios')->nullable();
            $table->text('observacion')->nullable();
            $table->string('rtm')->nullable();
            $table->date('fechartmvigente')->nullable();
            $table->string('soat')->nullable();
            $table->date('fechasoatvigente')->nullable();
            $table->text('embargo')->nullable();
            $table->text('observacionhv')->nullable();
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
            $table->unsignedBigInteger('empresa_id')
            ->nullable()
            ->index();
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresas');
            $table->boolean('activo')->default(1);
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
        Schema::dropIfExists('cierres');
    }
};
