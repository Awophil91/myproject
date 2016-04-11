<?php
/**
 * Created by PhpStorm.
 * User: Muyiwa
 * Date: 4/10/2016
 * Time: 11:28 PM
 */

namespace App\Http\Requests;


class NerdRequest extends Request {

    /**
     * @return bool
     * Determine if the user is authorized to make this request
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to this request
     */
    public function rules()
    {
        return [
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'
        ];
    }

}