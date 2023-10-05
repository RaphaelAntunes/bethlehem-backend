<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('descricao', 255);
            $table->dateTime('horario');
            $table->string('usr_responsavel', 255);
            $table->tinyInteger('status')->default(1);
            $table->string('tipo_evento', 255)->nullable();
            $table->string('mediador', 255)->nullable();
            $table->string('local', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
