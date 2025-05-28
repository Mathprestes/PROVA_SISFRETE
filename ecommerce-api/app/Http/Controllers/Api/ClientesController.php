<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientesRequest;
use App\Models\ClientesModel;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientesController extends Controller {
        
    public function index(): JsonResponse {
        
        //Ordenando a listagem de clientes por cod_cliente em ordem decrescente
        $clientes = ClientesModel::orderBy("cod_cliente","DESC")->get(); 
        
        //Trazendo as informações com paginação
        //$clientes = ClientesModel::orderBy("cod_cliente","DESC")->paginate(5);

        return response()->json([
            'status' => true,
            'message' => 'Lista de clientes',
            'clientes' => $clientes,
        ],200);

    }

    public function show($cod_cliente): JsonResponse {

        $cliente = ClientesModel::findOrFail($cod_cliente);

        return response()->json([
            'status' => true,
            'message' => 'Informações do cliente selecionado',
            'clientes' => $cliente,
        ],200);
        
    }

    public function store(ClientesRequest $request): JsonResponse {

       //dd($request); Ver a requisição

       //Iniciar a transação
       DB::beginTransaction();
       
       try {

            $cliente = ClientesModel::create([
                'nome_cliente' => $request->nome_cliente,
                'num_cpf_cnpj' => $request->num_cpf_cnpj,
                'ins_estadual' => $request->ins_estadual,
                'end_cliente' => $request->end_cliente,
                'den_bairro' => $request->den_bairro,
                'cod_cep' => $request->cod_cep,
                'cidade' => $request->cidade,
                'telefone' => $request->telefone,
                'data_cadastro' => $request->data_cadastro,
                'ativo' => $request->ativo,
            ]); 

            DB::commit();

            //Retorna uma mensagem de sucesso
            return response()->json([
                'status' => true,
                'cliente' => $cliente,
                'message' => 'Cliente cadastrado com sucesso!',
            ],201);

       } catch (Exception $e) {

            //Caso ocorra algum erro, desfaz a transação
            DB::rollBack();

            //Retorna uma mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Cliente não cadastrado',
            ],400);

        }  

    }

    public function update(Request $request, $cod_cliente): JsonResponse {

       //dd($request); Ver a requisição

       //Iniciar a transação
       DB::beginTransaction();

       try {

            $cliente = ClientesModel::findOrFail($cod_cliente);

            // Only() só passa os campos que realmente vieram no JSON da requisição, evitando sobrescrever com null.
            $cliente->update($request->only([
                'nome_cliente',
                'ins_estadual',
                'end_cliente',
                'den_bairro',
                'cod_cep',
                'cidade',
                'telefone',
                'data_cadastro',
                'ativo',
            ]));

            //Confirma a transação
            DB::commit();

            //Retorna os dados do usuario editado e uma mensagem de sucesso com status 200
            return response()->json([
                'status' => true,
                'cliente' => $cliente,
                'message' => 'Cliente editado com sucesso!',
            ],200);

       } catch (Exception $e) {

            //Caso ocorra algum erro, desfaz a transação
            DB::rollBack();

            //Retorna uma mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Cliente não editado',
            ],400);

        } 

    }

    public function destroy($cod_cliente): JsonResponse {

       //dd($request); Ver a requisição

       try {

            //Apagar o registro do cliente no banco de dados
            $cliente = ClientesModel::findOrFail($cod_cliente);
            
            $cliente->delete();

            //Retorna os dados do usuario excluido e uma mensagem de sucesso com status 200
            return response()->json([
                'status' => true,
                'cliente' => $cliente,
                'message' => 'Cliente excluido com sucesso!',
            ],200);

       } catch (Exception $e) {

            //Retorna uma mensagem de erro
            return response()->json([
                'status' => false,
                'message' => 'Cliente não apagado!',
            ],400);

        } 

    }

}