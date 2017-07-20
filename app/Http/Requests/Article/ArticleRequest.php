<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' =>  'required|min:2|max:50',
            'desc'  =>  'required|min:5|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'title' =>  '标题',
            'desc'  =>  '简介',
        ];
    }

    public function messages()
    {
        return [
            'required'  =>  ':attribute 为必填项',
            'min'       =>  ':attribute 的长度必须大于:min',
            'max'       =>  ':attribute 的长度必须小于:max',
        ];
    }
}
