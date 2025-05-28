<?php

namespace Database\Seeders;

use App\Models\ClientesModel;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder {

    public function run(): void {
        
        ClientesModel::insert([
            
            [
                'nome_cliente' => 'MATHEUS GOUVEIA PRESTES',
                'num_cpf_cnpj' => '477.698.328-10',
                'ins_estadual' => NULL,
                'end_cliente' => 'Adail Faria da cunha',
                'den_bairro' => 'Jose Fina',
                'cod_cep' => '19915-300',
                'cidade' => 'Ourinhos',
                'telefone' => '14991049435',
                'data_cadastro' => today(),
                'ativo' => 'S',
            ],
            [
                'nome_cliente' => 'MARIA LIMA SILVA',
                'num_cpf_cnpj' => '123.456.789-00',
                'ins_estadual' => 'ISENTO',
                'end_cliente' => 'Rua das Flores',
                'den_bairro' => 'Centro',
                'cod_cep' => '01010-000',
                'cidade' => 'São Paulo',
                'telefone' => '11999998888',
                'data_cadastro' => today(),
                'ativo' => 'S',
            ],
            [
                'nome_cliente' => 'JOÃO PEREIRA',
                'num_cpf_cnpj' => '321.654.987-00',
                'ins_estadual' => null,
                'end_cliente' => 'Av. Brasil',
                'den_bairro' => 'Vila Nova',
                'cod_cep' => '20040-002',
                'cidade' => 'Rio de Janeiro',
                'telefone' => '21988887777',
                'data_cadastro' => today(),
                'ativo' => 'N',
            ],
            [
                'nome_cliente' => 'ANA SOUZA',
                'num_cpf_cnpj' => '987.654.321-00',
                'ins_estadual' => null,
                'end_cliente' => 'Rua A, 100',
                'den_bairro' => 'Jardim Primavera',
                'cod_cep' => '13050-200',
                'cidade' => 'Campinas',
                'telefone' => '19977776666',
                'data_cadastro' => today(),
                'ativo' => 'S',
            ],

        ]);

    }
}
