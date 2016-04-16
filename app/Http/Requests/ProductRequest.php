<?php
/**
 * Created by PhpStorm.
 * User: Muyiwa
 * Date: 4/13/2016
 * Time: 11:34 PM
 */

namespace Manager\Http\Requests;


class ProductRequest extends Request
{

    /**
     * @return bool
     * Determine if the user is authorized to make this request
     */
    //public function authorize(Authenticator $auth)
    public function authorize()
    {
        //return $auth->user()->hasRole('administrator');
        return true;
    }

    /**
     * Get the validation rules that apply to this request
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3|max:255|unique:products,name,'.$this->route()->parameter('products'),
            'category_id'=>'required|exists:categories,id',
            'price'=>'required|numeric'
        ];

    }

    /**
     * Get the customized error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.exists' => 'Please select a category',
        ];
    }
}