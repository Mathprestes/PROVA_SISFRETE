<?php

namespace Database\Seeders;

use App\Models\PagamentosModel;
use Illuminate\Database\Seeder;

class PagamentosSeeder extends Seeder {

    public function run(): void {
       
        PagamentosModel::insert([
            
            [
                'cod_cond_pgto' => 1,
                'tipo_pgto' => 'PIX',
                'den_cnd_pgto' => 'Pagamento via Pix instantâneo',
                'situacao' => 'ATIVO',
            ],
            [
                'cod_cond_pgto' => 2,
                'tipo_pgto' => 'CREDI',
                'den_cnd_pgto' => 'Cartão de Crédito',
                'situacao' => 'ATIVO',
            ],
            [
                'cod_cond_pgto' => 3,
                'tipo_pgto' => 'DEBIT',
                'den_cnd_pgto' => 'Cartão de Débito',
                'situacao' => 'ATIVO',
            ],
            [
                'cod_cond_pgto' => 4,
                'tipo_pgto' => 'BOLET',
                'den_cnd_pgto' => 'Boleto Bancário',
                'situacao' => 'ATIVO',
            ],

        ]);

    }
    
}
