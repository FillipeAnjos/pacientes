<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createPatients();
        $this->createAddress();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('endereco');
    }

    public function createPatients(){
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->longText('foto');
            $table->string('nome');
            $table->string('nomemae');
            $table->date('nascimento');
            $table->string('cpf');
            $table->string('cns');
            $table->timestamps();
        });
    }

    public function createAddress(){
        Schema::create('residencia', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->string('endereco');
            $table->integer('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->integer('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->timestamps();
        });
    }
}
