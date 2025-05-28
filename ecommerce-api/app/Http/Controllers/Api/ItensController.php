<?php

namespace App\Http\Controllers\Api;

use App\Models\Item_categoriaModel;
use App\Http\Controllers\Controller;
use App\Models\ItensModel;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ItensController extends Controller {
        
    public function index(): JsonResponse {
        
        //Ordenando a listagem de itens por cod_item em ordem decrescente
        $itens = ItensModel::orderBy("cod_item","DESC")->get(); 
        
        //Trazendo as informações com paginação
        //$itens = ItensModel::orderBy("cod_item","DESC")->paginate(5);

        return response()->json([
            'status' => true,
            'message' => 'Lista de itens',
            'itens' => $itens,
        ],200);

    }

    public function show($num_categoria): JsonResponse {
        
        try {

            // Buscar todos os registros da categoria informada
            $itens_categoria = Item_categoriaModel::with('item')
                ->where('num_categoria', $num_categoria)
                ->get();

            // Extrair apenas os dados dos itens (de cada relação)
            $itens = $itens_categoria->pluck('item');

            return response()->json([
                'status' => true,
                'message' => 'Itens encontrados na categoria informada.',
                'itens' => $itens,
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Erro ao buscar itens por categoria.',
                'error' => $e->getMessage(),
            ], 500);

        }
    }

    public function filtroPorPreco(): JsonResponse {
        
        try {

            // Pega os parâmetros da query string
            $preco_min = request()->query('preco_min');
            $preco_max = request()->query('preco_max');

            // Começa a query base
            $query = ItensModel::query();

            // Aplica filtro preco_min, se for informado
            if (!is_null($preco_min)) {
                $query->where('pre_unit', '>=', $preco_min);
            }

            // Aplica filtro preco_max, se for informado
            if (!is_null($preco_max)) {
                $query->where('pre_unit', '<=', $preco_max);
            }

            // Ordena por cod_item DESC e pega os resultados
            $itens = $query->orderBy('cod_item', 'DESC')->get();

            return response()->json([
                'status' => true,
                'message' => 'Itens filtrados por faixa de preço.',
                'itens' => $itens,
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Erro ao buscar itens por faixa de preço.',
                'error' => $e->getMessage(),
            ], 500);

        }
    }
}