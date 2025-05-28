<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        
        Schema::create('tb_ped_itens', function (Blueprint $table) {
            
            $table->unsignedInteger('num_pedido');
            $table->integer('num_sequencia');
            $table->integer('cod_item');
            $table->decimal('pct_desc_adic', 4, 2)->nullable();
            $table->decimal('pre_unit', 17, 6);
            $table->integer('qtd_pecas_solic');

            $table->primary(['num_pedido', 'num_sequencia']);
            $table->foreign('num_pedido')->references('num_pedido')->on('tb_pedidos');
        
        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_ped_itens');
    }
    
};
