<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller {
    
    public function auth(Request $request) {

        // Valida os dados de entrada
        $user = User::where('email', $request->email)->first(); 

        //Se não encontrar o usuario ou a senha estiver incorreta
        if (!$user || !Hash::check($request->password, $user->password)) {

            throw ValidationException::withMessages([
                'email' => ['Credenciais de email/senha inválidas.'],
            ]);

        }

        // Exclui tokens antigos
        $user->tokens()->delete(); 

        //Gera um novo token para o usuário
        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
           'message' => 'Usuário autenticado com sucesso',
           'token' => $token
        ]);
    }

    public function logout(Request $request) {
        
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Usuário deslogado com sucesso',
        ]);
        
    }

    public function me(Request $request) {
        
        $user = $request->user();

        return response()->json([
            'me' => $user,
        ]);

    }
}
