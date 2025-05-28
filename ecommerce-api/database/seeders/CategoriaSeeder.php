<?php

namespace Database\Seeders;

use App\Models\CategoriaModel;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder {

    public function run(): void {
        
        CategoriaModel::insert([

            [
                'num_categoria' => 1,
                'grupo' => 'Móveis',
                'sub_grupo' => 'Camas',
                'pre_unit_base' => 1500.00,
            ],
            [
                'num_categoria' => 2,
                'grupo' => 'Móveis',
                'sub_grupo' => 'Sofás',
                'pre_unit_base' => 2200.50,
            ],
            [
                'num_categoria' => 3,
                'grupo' => 'Eletrodomésticos',
                'sub_grupo' => 'Geladeiras',
                'pre_unit_base' => 3000.00,
            ],
            [
                'num_categoria' => 4,
                'grupo' => 'Eletrônicos',
                'sub_grupo' => 'TVs',
                'pre_unit_base' => 1999.99,
            ],

        ]);

    }
    
}
