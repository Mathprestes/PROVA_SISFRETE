<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ped_ItensModel extends Model {

    use HasFactory;

    protected $table = 'tb_ped_itens';

    public $timestamps = false;

    protected $fillable = [
        'num_pedido',
        'num_sequencia',
        'cod_item',
        'pct_desc_adic',
        'pre_unit',
        'qtd_pecas_solic',
    ];

    //Relacionamento com pedido (muitos itens pertencem a um pedido)
    public function pedido(){
        return $this->belongsTo(PedidosModel::class, 'num_pedido', 'num_pedido');
    }

    //Relacionamento com item (muitos itens pedidos se referem a um item)
    public function item(){
        return $this->belongsTo(ItensModel::class, 'cod_item', 'cod_item');
    }

}
