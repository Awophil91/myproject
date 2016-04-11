<?php
/**
 * Created by PhpStorm.
 * User: Muyiwa
 * Date: 4/11/2016
 * Time: 12:18 AM
 */

namespace App\Http\Requests;

class TaskRequest extends Request
{

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
            'name' => 'required|max:255'
        ];
    }
}