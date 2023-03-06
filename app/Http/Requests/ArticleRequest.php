<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'titre' => 'required|max:50|string',
            'contenu' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'titre.required' => "Le champ Titre est réquis",
            "titre.max" => "Le champ Titre doit contenir au plus 50 caractères",
            "contenu.required" => "Le champ Contenu est réquis",
        ];
    }
}
