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
        Schema::create('emisiongas', function (Blueprint $table) {
            $table->id();
           
            $table->string('conorma');
            $table->string('covlr');
            $table->string('codosnorma');
            $table->string('codosvlr');
            $table->string('oxnorma');
            $table->string('oxvlr');
            $table->string('hcnorma');
            $table->string('hcvlr');
            $table->string('nonorma');
            $table->string('novlr');
            $table->string('unidad');
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
        Schema::dropIfExists('emisiongas');
    }
};
