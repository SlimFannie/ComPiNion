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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pseudo' => 'required|min:1|max:50',
            'nom' => 'required|min:1|max:50',
            'prenom' => 'required|min:1|max:50',
            'email' => 'required|min:1|max:50',
            'password' => 'required'
        ];
    }

    public function messages()
{
    return [
        'pseudo.required' => 'Le champ pseudo est requis.',
        'pseudo.min' => 'Le champ pseudo doit avoir au moins 1 caractères.',
        'pseudo.max' => 'Le champ pseudo ne doit pas dépasser 50 caractères.',
        'nom.required' => 'Le champ nom est requis.',
        'nom.min' => 'Le champ nom doit avoir au moins 1 caractères.',
        'nom.max' => 'Le champ nom ne doit pas dépasser 50 caractères.',
        'prenom.required' => 'Le champ prénom est requis.',
        'prenom.min' => 'Le champ prénom doit avoir au moins 1 caractères.',
        'prenom.max' => 'Le champ prénom ne doit pas dépasser 50 caractères.',
        'email.required' => 'Le champ email est requis.',
        'email.min' => 'Le champ email doit avoir au moins 1 caractères.',
        'email.max' => 'Le champ email ne doit pas dépasser 50 caractères.',
        'password.required' => 'Le champ mot de passe est requis.',
    ];
}
}
