<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'user_id' => 'integer',
            'title' => 'required',
            'authors' => 'required',
            'genres' => 'array|required',
            'description' => 'required',
            'cover' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'price' => 'required|numeric'
        ];
    }
}
