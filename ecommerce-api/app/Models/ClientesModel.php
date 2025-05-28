<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesModel extends Model {

    use HasFactory;

    protected $table = 'tb_clientes';
    protected $primaryKey = 'cod_cliente';  // Define o nome correto da chave primária

    public $timestamps = false;

    protected $fillable = [
        'nome_cliente',
        'num_cpf_cnpj',
        'ins_estadual',
        'end_cliente',
        'den_bairro',
        'cod_cep',
        'cidade',
        'telefone',
        'data_cadastro',
        'ativo',
    ];

}
