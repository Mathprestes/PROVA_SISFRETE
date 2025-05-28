<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PedidosModel;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PedidosController extends Controller {

    public function store(Request $request): JsonResponse {

       //dd($request); Ver a requisição

       //Iniciar a transação
       DB::beginTransaction();
       
       try {

            $pedido = PedidosModel::create([
                'cod_cliente'   => $request->cod_cliente,
                'data_pedido'   => $request->data_pedido,
                'cod_transp'    => $request->cod_transp,
                'cod_cond_pgto' => $request->cod_cond_pgto,
                'tip_venda'     => $request->tip_venda,
                'sit_pedido'    => $request->sit_pedido,
            ]); 

            DB::commit();

            //Retorna uma mensagem de sucesso
            return response()->json([
                'status' => true,
                'pedido' => $pedido,
                'message' => 'Pedido cadastrado com sucesso!',
            ],201);

       } catch (Exception $e) {

            //Caso ocorra algum erro, desfaz a transação
            DB::rollBack();

            //Retorna uma mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Pedido não cadastrado',
            ],400);
        }  
    }

    public function update(Request $request, $num_pedido): JsonResponse {

       //dd($request); Ver a requisição

       //Iniciar a transação
       DB::beginTransaction();

       try {

            $num_pedido = PedidosModel::findOrFail($num_pedido);

            // Only() só passa os campos que realmente vieram no JSON da requisição, evitando sobrescrever com null.
            $num_pedido->update($request->only([
                'cod_cliente',
                'data_pedido',
                'cod_transp',
                'cod_cond_pgto',
                'tip_venda',
                'sit_pedido',
            ]));

            //Confirma a transação
            DB::commit();

            //Retorna os dados do pedido editado e uma mensagem de sucesso com status 200
            return response()->json([
                'status' => true,
                'num_pedido' => $num_pedido,
                'message' => 'Pedido editado com sucesso!',
            ],200);

       } catch (Exception $e) {

            //Caso ocorra algum erro, desfaz a transação
            DB::rollBack();

            //Retorna uma mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Pedido não editado',
            ],400);
        } 
    }
}