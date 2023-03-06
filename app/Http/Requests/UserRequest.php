<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "username"=>"required|min:2|string",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:8"
        ];
    }

    public function messages():array
    {
        return [
            "username.required"=>"Le champ Nom d'utilisateur est requis",
            "username.min"=>"Le champ Nom requiert au-moins 2 caractères",
            "password.required"=>"Le champ Mot de Passe est requis",
            "email.required"=>"Le champ Email est requis",
            "email.unique"=>"L'email renseigné est déjà utlisé par un autre compte",
            "password.min"=>"Le champ Mot de Passe requiert au-moins 8 caractères"
        ];
    }
}
