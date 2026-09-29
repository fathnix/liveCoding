<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class PutProduct extends FormRequest
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
            'category_id' => 'sometimes|required|string|exists:categories,id',
            'name' => 'sometimes|required|string|max:255',
            'product' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|integer|min:1'
        ];
    }

    #[Override]
    public function messages()
    {
        return[
            'category_id.required' =>  'Kategori wajib di isi',
            'category.exists' => 'Id kategori tidak ada',
            'name.required' => 'nama wajib di isi',
            'name.max' => 'tidak boleh lebih dari 255 karakter',
            'product.required' => 'product wajib di isi',
            'product.max' => 'tidak boleh lebih dari 255 karakter',
            'quantity.required' => 'quantity wajib di isi',
            'quantity.min' => 'minimal barang di titipkan 1 buah'
        ];
    }
}
