@extends('layouts.app')

@section('content')
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    @include('common.errors')
                    {{ Form::open(array('action' => 'TaskController@postNew', 'class'=>'form-horizontal')) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Task', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-6">
                            {{ Form::text('name', old('task'), array('id' => 'name', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>ADD
                            </button>
                        </div>
                    </div>
                    {{ Form::close() }}

                   {{-- <form action="{{ action('TaskController@postNew') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        Task Name
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>
                            <div class="col-sm-6">
                                <input type="text" name="task-name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        Add Task Button
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>ADD
                                </button>
                            </div>
                        </div>
                    </form>--}}
                </div>
            </div>

            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text"><div>{{ $task->name }}</div></td>

                                    {{--Task Delete Button--}}
                                    <td>
                                        <form action="{{ action('TaskController@postDelete', [$task->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>DELETE
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
@endsection
