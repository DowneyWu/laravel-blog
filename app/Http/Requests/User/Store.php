<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * 这个方法是用来控制访问权限
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
     * 返回验证规则数组
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  =>  'required|min:3|max:50',
            'email' =>  'required|unique:users',
            'password'  =>  'required|min:6|confirmed',
        ];
    }

    /**
     * 定义字段名中文
     *
     * @return array
     */
    public function attributes()
    {
       return [
           'name'   =>  '名称',
           'email'  =>  '邮箱',
           'password'   =>  '密码',
       ];
    }


    /**
     * 定义验证失败提示
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'  =>  ':attribute 是必填的',
            'min'       =>  ':attribute 长度必须大于:min',
            'max'       =>  ':attribute 长度必须小于:max',
            'confirmed' =>  ':attribute 两次输入的密码不一样',
            'unique'    =>  ':attribute 邮箱已经重复了',
        ];
    }


}
