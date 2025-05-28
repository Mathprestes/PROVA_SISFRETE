<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        
        Schema::create('tb_itens', function (Blueprint $table) {
            
            $table->integer('cod_item')->primary();

            $table->char('den_item', 150);
            $table->char('den_item_reduz', 20)->nullable();
            $table->char('tip_item', 1)->nullable();
            $table->char('cod_uni_med', 3)->nullable();
            $table->decimal('pre_unit', 17, 6);
            $table->char('ativo', 1)->default('S');
            
        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_itens');
    }
    
};
