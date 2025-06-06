<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
            'category_id'   => 'required|exists:categories,id',
            'title'         => 'required|string|min:3|max:255',
            'description'   => 'required|string|max:255',
            'ingredients'   => 'required|string',
            'instructions'  => 'required|string',
            'image'         => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg| max:2048',
            'tags'          => 'required',
        ];
    }
}
