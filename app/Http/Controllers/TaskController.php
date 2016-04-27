<?php


namespace Manager\Http\Controllers;


use Illuminate\Http\Request;
use Manager\Http\Requests\TaskRequest;
use Manager\Repositories\TaskRepository;
use Manager\Models\Task;


class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    //url: task/index
    public function getIndex(Request $request)
    {
        return view('task.tasks', [
            'tasks' => $this->tasks->forUser($request->user())
        ]);
    }

    //url: task/new for HTTPGET
    //public function getNew(){};

    //url: task/new for HTTPPOST
    public function postNew(TaskRequest $request)
    {
        $task=new Task();
        $task->name = $request->name;
        $this->authorize($task);
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        session()->flash('message', 'Successfully created Task!');
        return redirect()->action('TaskController@getIndex');
    }


    //public function getEdit($id){}
    //public function postEdit($id){}

    //url: task/delete
    //public function getDelete($id){}

    //url: task/delete
    public function postDelete(Request $request, $id)
    {
        $task=Task::findOrFail($id);
        $this->authorize($task);
        $task->delete();
        return redirect()->action('TaskController@getIndex');
    }
}