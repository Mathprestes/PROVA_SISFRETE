<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        
        Schema::create('tb_pagamentos', function (Blueprint $table) {
            
            $table->integer('cod_cond_pgto')->primary();  // Chave primária sem auto-incremento
            
            $table->char('tipo_pgto', 5);
            $table->char('den_cnd_pgto', 50);
            $table->char('situacao', 5);
            
        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_pagamentos');
    }
    
};
