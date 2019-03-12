<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/*
|--------------------------------------------------------------------------
|           大迪克控制器->友情链接表单验证 FriendStroeRequest
|--------------------------------------------------------------------------
 */

class FriendStoreRequest extends FormRequest
{
    /**
     * 开启表单验证
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *
     * 存放验证规则
     * @return array
     */
    public function rules()
    {
        return [
            'flk_name' => 'required',
            'flk_email' => 'required|email',
            'flk_depict' => 'required',
            'flk_url'=>'required',
            'flk_image'=>'required',
        ];
    }
    /**
     * 自定义错误信息
     * @return 视图信息
     */
    public function messages()
    {
        return [
            'flk_name.required'=>'网站名必填',
            'flk_url.required'=>'网站地址必填',
            'flk_image.required'=>'图片地址必填',
            'flk_email.required'=>'邮箱必填',
            'flk_email.email'=>'邮箱格式不正确',
            'flk_depict.required'=>'描述必填',
        ];
    }
}
