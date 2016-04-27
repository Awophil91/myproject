<?php


namespace Manager\Http\Requests;


class CategoryRequest extends Request
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
            'name'=>'required|min:3|max:255|unique:categories,name,'.$this->route()->parameter('categories')
        ];
    }
}