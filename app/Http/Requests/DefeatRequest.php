<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DefeatRequest extends FormRequest
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
        return [
            'user_id' => 'required',
            'harmed' => 'required',
            'pain' => 'required',
            'date_at' => 'required|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id' => [
                'required' => 'O campo jogador é obirgatório!',
            ],
            'harmed.required' => 'O campo prejudicou é obrigatório!',
            'pain.required' => 'O campo castigo é obrigatório',
            'date_at' => [
                'required' => 'O campo data é obrigatório',
                'max' => 'O campo data excedeu ao máximo de :max caracteres!',
            ],
        ];
    }
}
