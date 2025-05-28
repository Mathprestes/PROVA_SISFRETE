<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void {

        $this->call([

            CategoriaSeeder::class,
            PagamentosSeeder::class,
            ClientesSeeder::class,
            ItensSeeder::class,
            Item_categoriaSeeder::class,
            PedidosSeeder::class,
            Ped_itensSeeder::class,
            UserSeeder::class,

        ]);
    }
}
