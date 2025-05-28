<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        
        Schema::create('tb_item_categoria', function (Blueprint $table) {
            
            $table->integer('cod_item');
            $table->integer('num_categoria');

            $table->primary(['cod_item', 'num_categoria']);
            $table->foreign('cod_item')->references('cod_item')->on('tb_itens');
            $table->foreign('num_categoria')->references('num_categoria')->on('tb_categoria');
        
        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_item_categoria');
    }
    
};
