<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoods_adminPost extends FormRequest
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
              'user_account'=>'required|unique:Goods_admin|max:12|min:2',
        ];
    }
    public function messages(){
        return[
               'user_account.required'=>'名字不能为空',
             'user_account.unique'=>'名字存在',
             'user_account.max'=>'名字长度不能错过12位',
             'user_account.min'=>'名字不长度不少于2位',
            
        ];
    }
}
