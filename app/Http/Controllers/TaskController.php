<?php
/**
 * Created by PhpStorm.
 * User: Muyiwa
 * Date: 4/9/2016
 * Time: 11:29 AM
 */

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;


class TaskController extends Controller
{

    public function __construct()
    {

    }

    //url: task/index
    public function getIndex()
    {

        session()->flash('title', 'Task Manager');
        session()->flash('url', url('tasks'));
        //session('Title', 'Tasks Manager');
        //if you nest your views in folders may be by their controllers e.g say task folder
        //for task controller. Then you have to indicate the path to the view relative to
        //App\resources\views where laravel expects views to be using the view alias defined
        //in the aliases section in config\app.php
        return view('task.tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    }

    //url: task/new for HTTPGET
    //public function getNew(){};

    //url: task/new for HTTPPOST
    public function postNew(TaskRequest $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        session()->flash('message', 'Successfully created Task!');
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