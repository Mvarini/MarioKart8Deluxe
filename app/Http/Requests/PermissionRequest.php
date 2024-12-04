<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        $permissionId = $this->route()->parameter('permission');

        return [
            'title' => 'required|unique:permissions,title, ' . ($permissionId ? $permissionId->id : null),
            'name' => 'required|unique:permissions,name,' . ($permissionId ? $permissionId->id : null),
        ];
    }

    public function messages(): array
    {
        return [
          'title' => [
              'required' => 'O nome da permissão é obrigatório!',
              'unique' => 'O nome da permissão já existe!'
          ],
            'name' => [
                'required' => 'A rota é obrigatório!',
                'unique' => 'A rota já existe!'
            ],
        ];
    }
}
