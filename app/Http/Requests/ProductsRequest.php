<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name' => 'required | max:255',
            'company_name' => 'required | max:255',
            'price' => 'required | integer',
            'stock' => 'required | integer',
            'comment' => 'txet | max:255',
            'img_path' => 'url',
        ];
    }
    
    public function attributes()
    {
        return [
            'product_name' => '商品名',
            'company_name' => 'メーカー',
            'price' => '価格',
            'stock' => '在庫数',
            'comment' => 'コメント',
            'img_path' => '商品画像',
        ];
    }

    public function messages() {
        return [
            'product_name.required' => ':attributeは必須項目です。',
            'product_name.max' => ':attributeは:max字以内で入力してください。',
            'company_name.required' => ':attributeは必須項目です。',
            'company_name.max' => ':attributeは:max字以内で入力してください。',
            'price.required' => ':attributeは必須項目です。',
            'stock.required' => ':attributeは必須項目です。',
            'comment.max' => ':attributeは:max字以内で入力してください。',
            'img_path.url' => ':attributeはURL形式で入力してください。',
        ];
    }
}
