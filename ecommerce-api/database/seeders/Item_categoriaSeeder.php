<?php

namespace Database\Seeders;

use App\Models\Item_categoriaModel;
use Illuminate\Database\Seeder;

class Item_categoriaSeeder extends Seeder {

    public function run(): void {
        
        Item_categoriaModel::insert([
            
            [
                'cod_item' => 101,
                'num_categoria' => 1,
            ],
            [
                'cod_item' => 102,
                'num_categoria' => 2,
            ],
            [
                'cod_item' => 103,
                'num_categoria' => 3,
            ],
            [
                'cod_item' => 104,
                'num_categoria' => 4,
            ],

        ]);

    }
    
}
