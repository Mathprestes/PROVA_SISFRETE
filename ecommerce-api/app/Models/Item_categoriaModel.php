<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_categoriaModel extends Model {

    use HasFactory;

    protected $table = 'tb_item_categoria';

    public $incrementing = false; // Necessário para chave primária composta
    public $timestamps = false;
    
    protected $fillable = [
        'cod_item',
        'num_categoria',
    ];

    // Relacionamento com Item
    public function item(){
        return $this->belongsTo(ItensModel::class, 'cod_item', 'cod_item');
    }

    // Relacionamento com Categoria
    public function categoria(){
        return $this->belongsTo(CategoriaModel::class, 'num_categoria', 'num_categoria');
    }

}
