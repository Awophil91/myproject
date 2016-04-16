<?php
/**
 * Created by PhpStorm.
 * User: Muyiwa
 * Date: 4/10/2016
 * Time: 11:28 PM
 */

namespace Manager\Http\Requests;


class NerdRequest extends Request {

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
        /**for unique validation rule we have to handle the case
         *of updating/editing by appending id of the row to ignore to the
         * rule using $this->route()->parameter('nerds')
        */

        /**for file size validation rule, note that laravel expects value in KB
        *so 1MB=1024KB, 4MB(4*1024)=4096KB*/
        return [
            'name'       => 'required|alpha_num|min:3|max:255|unique:nerds,name,'.$this->route()->parameter('nerds'),
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric',
            'image'      => 'image|max:4096'
        ];
    }
}