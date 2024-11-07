<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $profileEmail = $this->input('email');

        return [
            'name' => 'required|max:200',
            'nickname' => 'required|max:50',
//            'email' => 'required|email|lowercase', Rule::unique('users', 'email')->ignore($profileEmail),
            'email' => 'required|email|lowercase|unique:users,email,' . Auth::id(),
            'birthday' => 'required|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'O nome é obrigatório',
                'max' => 'O nome ultrapassou o limite de :max caracteres',
            ],
            'nickname' => [
                'required' => 'O apelido é obrigatório',
                'max' => 'O apelido ultrapassou o limite de :max caracteres',
            ],
            'email' => [
                'required' => 'O email é obrigatório',
                'email' => 'Insira um email válido',
                'lowercase' => 'O email deve ter letras minúsculas',
                'unique' => 'Esse e-mail já existe',
            ],
            'birthday' => [
                'required' => 'Data de aniversário é obrigatória',
                'date' => 'Insira uma data de aniversário válida',
                'max' => 'A data de aniversário deve conter no máximo :max caracteres',
            ],
            'image' => [
                'image' => 'O campo imagem apenas aceita imagem',
                'mimes' => 'O campo imagem só aceita arquivos do tipo: jpeg, png, jpg e gif',
                'max' => 'A imagem não pode ser superior a 2MB'
            ],
        ];
    }
}
