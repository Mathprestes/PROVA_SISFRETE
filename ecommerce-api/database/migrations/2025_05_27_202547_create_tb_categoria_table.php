<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        
        Schema::create('tb_categoria', function (Blueprint $table) {
            
            $table->integer('num_categoria')->primary();

            $table->char('grupo', 50);
            $table->char('sub_grupo', 20)->nullable();
            $table->decimal('pre_unit_base', 17, 6);
            
        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_categoria');
    }
    
};
