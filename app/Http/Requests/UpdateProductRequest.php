<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'expiration_date' => 'nullable|date|after_or_equal:today',
            'stock' => 'numeric'
        ];
    }

    public function messages(): array
{
    return [
        'expiration_date.after_or_equal' => 'A data de validade não pode ser retroativa.',
        'description.required' => 'O campo descrição é obrigatório',
        'photo.max' => 'A imagem deve ter no máximo 5MB.',
        'category_id.required' => 'O campo Categoria é obrigatório',
        'name.required' => 'A Nome é obrigatório',
        'price.required' => 'O Campo preço é obrigatório',
        'stock.numeric' => 'Stock precisa ser numérico',
        'photo.mimes' => 'Imagem deve ser Jpeg,png ou jpg',
    ];
}
}
