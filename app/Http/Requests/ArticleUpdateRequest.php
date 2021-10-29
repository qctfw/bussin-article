<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique(\App\Models\Article::class)->ignore(request()->route('article')),],
            'category' => ['required', 'exists:App\Models\Category,id'],
            'content' => ['required', 'string'],
            'banner' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', 'in:publish,draft']
        ];
    }
}
