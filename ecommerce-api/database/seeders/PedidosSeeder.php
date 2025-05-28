<?php

namespace Database\Seeders;

use App\Models\PedidosModel;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder {

    public function run(): void {
      
        PedidosModel::insert([
            
            [
                'num_pedido' => 1,
                'cod_cliente' => 1,
                'data_pedido' => '2024-05-27',
                'cod_transp' => 'CORREIOS',
                'cod_cond_pgto' => 1,
                'tip_venda' => 1,
                'sit_pedido' => 'A',
            ],
            [
                'num_pedido' => 2,
                'cod_cliente' => 2,
                'data_pedido' => '2024-05-27',
                'cod_transp' => 'JADLOG',
                'cod_cond_pgto' => 2,
                'tip_venda' => 2,
                'sit_pedido' => 'F',
            ],
            [
                'num_pedido' => 3,
                'cod_cliente' => 1,
                'data_pedido' => '2024-05-26',
                'cod_transp' => 'TOTAL',
                'cod_cond_pgto' => 3,
                'tip_venda' => 1,
                'sit_pedido' => 'P',
            ],
            [
                'num_pedido' => 4,
                'cod_cliente' => 3,
                'data_pedido' => '2024-05-25',
                'cod_transp' => 'DHL',
                'cod_cond_pgto' => 1,
                'tip_venda' => 3,
                'sit_pedido' => 'A',
            ],

        ]);

    }
    
}
