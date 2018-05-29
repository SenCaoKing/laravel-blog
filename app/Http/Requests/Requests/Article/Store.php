<?php

namespace App\Http\Requests\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'category_id' => 'required',
            'title'       => 'required',
            'author'      => 'required',
            'keywords'    => 'required',
            'tag_ids'     => 'required',
            'content'     => 'required'
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
            'category_id' => '分类',
            'title'       => '标题',
            'author'      => '作者',
            'keywords'    => '关键词',
            'tag_ids'     => '标签',
            'content'     => '内容'
        ];
    }

    /**
     * 定义字段名中文
     *
     * @return array
     */
    public function messages()
    {
        return [
            'tag_ids.required' => '必须选择标签',
        ];
    }

}