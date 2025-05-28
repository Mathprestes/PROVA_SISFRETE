<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensModel extends Model {

    use HasFactory;

    protected $table = 'tb_itens';
    protected $primaryKey = 'cod_item';  // Define o nome correto da chave primária

    public $timestamps = false; 

    protected $fillable = [
        'cod_item',
        'den_item',
        'den_item_reduz',
        'tip_item',
        'cod_uni_med',
        'pre_unit',
        'ativo',
    ];

}
