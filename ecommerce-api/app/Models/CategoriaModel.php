<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model {

    use HasFactory;

    protected $table = 'tb_categoria';
    protected $primaryKey = 'num_categoria';  // Define o nome correto da chave primária

    public $timestamps = false;

    protected $fillable = [
        'num_categoria',
        'grupo',
        'sub_grupo',
        'pre_unit_base',
    ];

}
