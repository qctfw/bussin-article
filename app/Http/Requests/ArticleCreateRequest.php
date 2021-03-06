<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'unique:App\Models\Article,title'],
            'category' => ['required', 'exists:App\Models\Category,id'],
            'content' => ['required', 'string'],
            'banner' => ['required', 'image', 'max:2048'],
            'status' => ['required', 'in:publish,draft']
        ];
    }
}
