<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'      => 'required|unique:posts|max:255',
            'image'      => 'required|mimes:jpeg,bmp,png',
            'content'    => 'required|min:10',
            'article_id' => 'required',
        ];
    }
}
