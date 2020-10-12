<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_ar'        => 'required|string',
            'title_en'        => 'required|string',
            'slug'            => ['required', 'string', Rule::unique('products')->ignore($this->product),],
            'description'     => 'string|nullable',
            'overview'        => 'string|nullable',
            'category_id'     => 'required|exists:categories,id',
            'trademark_id'    => 'nullable|exists:trademarks,id',
            'manufacturer_id' => 'nullable|exists:manufacturers,id',
            'color_id'        => 'nullable|exists:colors,id',
            'weight'          => 'nullable|numeric',
            'weight_id'       => 'nullable|exists:weights,id',
            'size_id'         => 'nullable|exists:sizes,id',
            'price'           => 'required|numeric',
            'stock'           => 'required|integer',
            'stock_starts_at' => 'nullable|date',
            'stock_ends_at'   => 'nullable|date',
            'offer_price'     => 'nullable|numeric',
            'offer_starts_at' => 'nullable|date',
            'offer_ends_at'   => 'nullable|date',
        ];
    }
}
