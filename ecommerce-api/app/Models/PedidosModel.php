<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosModel extends Model {

    use HasFactory;

    protected $table = 'tb_pedidos';
    protected $primaryKey = 'num_pedido';  // Define o nome correto da chave primária

    public $timestamps = false; 

    protected $fillable = [
        'num_pedido',
        'cod_cliente',
        'data_pedido',
        'cod_transp',
        'cod_cond_pgto',
        'tip_venda',
        'sit_pedido',
    ];

    // Relacionamento com clientes
    public function cliente(){
        return $this->belongsTo(ClientesModel::class, 'cod_cliente', 'cod_cliente');
    }

    // Relacionamento com condições de pagamento
    public function condicaoPagamento(){
        return $this->belongsTo(PagamentosModel::class, 'cod_cond_pgto', 'cod_cond_pgto');
    }

}
