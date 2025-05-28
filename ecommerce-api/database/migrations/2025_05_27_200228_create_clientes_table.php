<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        
        Schema::create('tb_clientes', function (Blueprint $table) {
            
            $table->increments('cod_cliente'); // Chave primária com auto-incremento
            
            $table->char('nome_cliente', 50);
            $table->char('num_cpf_cnpj', 19);
            $table->char('ins_estadual', 16)->nullable();
            $table->char('end_cliente', 40);
            $table->char('den_bairro', 19);
            $table->char('cod_cep', 9);
            $table->char('cidade', 15);
            $table->char('telefone', 15)->nullable();
            $table->date('data_cadastro');
            $table->char('ativo', 1)->default('S');
            
        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_clientes');
    }

};
