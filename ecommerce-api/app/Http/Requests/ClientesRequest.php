<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use iLLuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClientesRequest extends FormRequest {

    //Manipular falha de validação e retornar uma resposta JSON com erros de validação
    protected function failedValidation(Validator $validator) {

        throw new HttpResponseException(response()->json([
            'status' => 'false',
            'errors' => $validator->errors(),
        ], 422));

    }

    public function rules(): array {

        // Recuperar o id do usuário enviado na URL
        $clienteId = $this->route('clientes');

        return [
            'num_cpf_cnpj' => 'required|unique:tb_clientes,num_cpf_cnpj' . ($clienteId ? ',' . $clienteId->cod_cliente . ',cod_cliente' : ''),
        ];

    }

    public function messages(): array {

        return [
            'num_cpf_cnpj.required' => 'O campo CPF/CNPJ é obrigatório.',
            'num_cpf_cnpj.unique' => 'O CPF/CNPJ já está cadastrado.',
        ];
        
    }

}
