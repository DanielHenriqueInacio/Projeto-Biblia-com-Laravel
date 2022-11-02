<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnotacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            "titulo" => "required",
            "anotacao" => "required"
        ];
    }

    public function messages()
    {
        return [
          "titulo.required" => "Por favor preencha o campo Título, ele é obrigatório!",
          "anotacao.required" => "Por gentileza preencher o campo Anotação.",
        ];
    }
}
