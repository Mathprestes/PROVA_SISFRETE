<?php

namespace Database\Seeders;

use App\Models\ItensModel;
use Illuminate\Database\Seeder;

class ItensSeeder extends Seeder {

    public function run(): void {
        
        ItensModel::insert([

            [
                'cod_item' => 101,
                'den_item' => 'Colchão Casal Molas Ensacadas',
                'den_item_reduz' => 'Colchão Casal',
                'tip_item' => 'P',
                'cod_uni_med' => 'UN',
                'pre_unit' => 199.90,
                'ativo' => 'S',
            ],
            [
                'cod_item' => 102,
                'den_item' => 'Sofá Retrátil 3 Lugares',
                'den_item_reduz' => 'Sofá 3L',
                'tip_item' => 'P',
                'cod_uni_med' => 'UN',
                'pre_unit' => 349.90,
                'ativo' => 'S',
            ],
            [
                'cod_item' => 103,
                'den_item' => 'Guarda-Roupa 6 Portas',
                'den_item_reduz' => 'G. Roupa 6P',
                'tip_item' => 'P',
                'cod_uni_med' => 'UN',
                'pre_unit' => 99.99,
                'ativo' => 'S',
            ],
            [
                'cod_item' => 104,
                'den_item' => 'Base Cama Box Casal',
                'den_item_reduz' => 'Base Box C.',
                'tip_item' => 'P',
                'cod_uni_med' => 'UN',
                'pre_unit' => 199.90,
                'ativo' => 'S',
            ],

        ]);

    }
    
}
