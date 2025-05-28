<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentosModel extends Model {

    use HasFactory;

    protected $table = 'tb_pagamentos';
    protected $primaryKey = 'cod_cond_pgto';  // Define o nome correto da chave primária

    public $timestamps = false; 

    protected $fillable = [
        'cod_cond_pgto',
        'tipo_pgto',
        'situacao',
        'tipo_pgto',
    ];

}
