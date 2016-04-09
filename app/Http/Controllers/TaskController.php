<?php
/**
 * Created by PhpStorm.
 * User: Muyiwa
 * Date: 4/9/2016
 * Time: 11:29 AM
 */

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;


class TaskController extends Controller
{

    public function __construct()
    {

    }

    //url: task/index
    public function getIndex()
    {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    }

    //url: task/new for HTTPGET
    //public function getNew(){};

    //url: task/new for HTTPPOST
    public function postNew(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect()->action('TaskController@getIndex');
    }


    //public function getEdit($id){}
    //public function postEdit($id){}

    //url: task/delete
    //public function getDelete($id){}

    //url: task/delete
    public function postDelete($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->action('TaskController@getIndex');
    }
}