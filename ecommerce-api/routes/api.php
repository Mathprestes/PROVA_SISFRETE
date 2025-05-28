<?php

use App\Http\Controllers\Api\ItensController;
use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\PedidosController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
Exemplo usando o Postman
URL POST: http://127.0.0.1:8000/api/login
Body:
    {
        "email": "provasisfrete@teste.com.br",
        "password": "12345",
        "device_name": "Postman"
    }
Desabilitar a opção de 'Accept' na aba de Headers, que está com valor igual a '* / *'
Criar novo 'Accept' com valor de 'application/json'

Rota para fazer autenticação*/
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');


//Para usar os metodos é necessario gerar o token de autenticação
//Adicionar no "Headers" do Postman o campo "Authorization" com o valor Bearer{+token}


//RESTFULL API para tabela de Clientes
Route::get('/clientes', [ClientesController::class, 'index'])->middleware('auth:sanctum');  //GET - http://127.0.0.1:8000/api/clientes ou http://127.0.0.1:8000/api/clientes?page=1
Route::get('/clientes/{cod_cliente}', [ClientesController::class, 'show'])->middleware('auth:sanctum'); //GET - http://127.0.0.1:8000/api/clientes/1
Route::post('/clientes', [ClientesController::class, 'store'])->middleware('auth:sanctum'); //POST - http://127.0.0.1:8000/api/clientes
Route::put('/clientes/{cod_cliente}', [ClientesController::class, 'update'])->middleware('auth:sanctum'); //PUT - http://127.0.0.1:8000/api/clientes/1
Route::delete('/clientes/{cod_cliente}', [ClientesController::class, 'destroy'])->middleware('auth:sanctum'); //DELETE - http://127.0.0.1:8000/api/clientes/1


//Criação e atualização da tabela de Pedidos
Route::post('/pedidos', [PedidosController::class, 'store'])->middleware('auth:sanctum'); //POST - http://127.0.0.1:8000/api/pedidos
Route::put('/pedidos/{num_pedido}', [PedidosController::class, 'update'])->middleware('auth:sanctum'); //PUT - http://127.0.0.1:8000/api/pedidos/1


//Listagens para tabela de itens do pedido
Route::get('/itens', [ItensController::class, 'index'])->middleware('auth:sanctum');  //GET - http://localhost:8000/api/itens ou http://localhost:8000/api/itens
Route::get('/itens/{num_categoria}', [ItensController::class, 'show'])->middleware('auth:sanctum'); //GET - http://localhost:8000/api/itens/1
Route::get('/itens', [ItensController::class, 'filtroPorPreco'])->middleware('auth:sanctum'); //GET - http://localhost:8000/api/itens?preco_min=100&preco_max=500


//Função que intercepta qualquer rota não mapeada nesse arquivo (Serve para todos os métodos HTTP)
Route::fallback(function (Request $request) {
    return response()->json([
        'status' => false,
        'message' => 'Essa rota ou método HTTP não é permitido nesta API. Verifique a URL.',
        'path' => $request->path(),
        'method' => $request->method(),
    ], 404);
});