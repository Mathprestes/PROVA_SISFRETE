<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        
        Schema::create('tb_pedidos', function (Blueprint $table) {
            
            $table->increments('num_pedido');

            $table->unsignedInteger('cod_cliente');
            $table->date('data_pedido');
            $table->char('cod_transp', 15)->nullable();
            $table->integer('cod_cond_pgto');
            $table->integer('tip_venda');
            $table->char('sit_pedido', 1)->nullable();

            $table->foreign('cod_cliente')->references('cod_cliente')->on('tb_clientes');
            $table->foreign('cod_cond_pgto')->references('cod_cond_pgto')->on('tb_pagamentos');

        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_pedidos');
    }
    
};
