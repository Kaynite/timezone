<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesRequest extends FormRequest
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
            'name_ar'   => 'required|max:225',
            'name_en'   => 'required|max:225',
            'parent_id' => 'numeric|nullable',
            'image'     => 'image',
            'slug'      => ['required', 'string', Rule::unique('categories')->ignore($this->category)],
        ];
    }
}
