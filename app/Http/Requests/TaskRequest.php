<?php


namespace Manager\Http\Requests;


class TaskRequest extends Request
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
        //unique:table,column,except,idColumn
        //unique with multiple where clauses:
        //'unique:table,column,except,idColumn,Field1,value1,field2,value2,field3,value3'
        //the unique rule here is equivalent to the statement
        //"check that the name specified for a task is unique
        //to do this, check the values in the name column of tasks table
        //ignore rows where the id is equal to id parameter of the request(in case of when intention is to edit and not to create)
        //and where user_id of the row is equal to the current user's id
        //this way a task name is unique for each user
        //user A cannot have two tasks with the same name, though  other can have tasks with
        //the same names as user A.
        return [
            'name' => 'required|string|min:3|max:255|unique:tasks,name,'.$this->route()->parameter('tasks').',id,user_id,'.$this->user()->id,
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
            'name.unique' => 'You already have a task with that name',
        ];
    }
}