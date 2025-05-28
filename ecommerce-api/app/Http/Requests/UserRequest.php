<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {

    public function authorize(): bool {
        return false;
    }

    public function rules(): array {
        
        return [
            'email' => [
                'required',
                'email',
                'max:255',
            ],
            'password' => [
                'required',
                'max:255',
            ],
            'device_name' => [
                'required',
                'max:255',
            ],
        ];
    }
}
