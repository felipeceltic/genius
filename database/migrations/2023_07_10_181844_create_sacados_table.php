<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSacadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_sacado');
            $table->string('cnpj');
            $table->string('razao_social');
            $table->string('tipo_inscricao')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('ddd_telefone')->nullable();
            $table->string('ramal')->nullable();
            $table->string('nome_contato')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->string('comprador_autorizado')->nullable();
            $table->string('rg')->nullable();
            $table->string('orgao_emissor')->nullable();
            $table->string('uf_emissor')->nullable();
            $table->string('cpf')->nullable();
            $table->string('cargo')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sacados');
    }
}
