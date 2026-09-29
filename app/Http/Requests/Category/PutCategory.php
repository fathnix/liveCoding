<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class PutCategory extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:55'
        ];
    }

    #[Override]
    public function messages()
    {
        return[
            'name.required' => 'nama wajib di isi',
            'name.max' => 'tidak boleh lebih dari 55 karakter'
        ];  
    }
}
