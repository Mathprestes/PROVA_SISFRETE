<?php

namespace Database\Seeders;

use App\Models\Ped_itensModel;
use Illuminate\Database\Seeder;

class Ped_itensSeeder extends Seeder {

    public function run(): void {
            
        Ped_itensModel::insert([

            [
                'num_pedido' => 1,
                'num_sequencia' => 1,
                'cod_item' => 101,
                'pct_desc_adic' => 5.00,
                'pre_unit' => 199.90,
                'qtd_pecas_solic' => 2,
            ],
            [
                'num_pedido' => 1,
                'num_sequencia' => 2,
                'cod_item' => 102,
                'pct_desc_adic' => 0.00,
                'pre_unit' => 349.90,
                'qtd_pecas_solic' => 1,
            ],
            [
                'num_pedido' => 2,
                'num_sequencia' => 1,
                'cod_item' => 103,
                'pct_desc_adic' => 10.00,
                'pre_unit' => 99.99,
                'qtd_pecas_solic' => 4,
            ],
            [
                'num_pedido' => 2,
                'num_sequencia' => 2,
                'cod_item' => 104,
                'pct_desc_adic' => 0.00,
                'pre_unit' => 199.90,
                'qtd_pecas_solic' => 1,
            ],

        ]);

    }

}
