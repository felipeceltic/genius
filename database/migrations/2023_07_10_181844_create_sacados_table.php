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
            $table->string('tipo_inscricao');
            $table->string('cep');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('ddd_telefone');
            $table->string('ramal')->nullable();
            $table->string('nome_contato');
            $table->string('email');
            $table->string('status');
            $table->string('comprador_autorizado');
            $table->string('rg');
            $table->string('orgao_emissor');
            $table->string('uf_emissor');
            $table->string('cpf');
            $table->string('cargo');
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
