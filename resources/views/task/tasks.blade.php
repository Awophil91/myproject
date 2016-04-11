@extends('layouts.app')

@section('content')
        <div class="col-sm-offset-2 col-sm-8">
            @if (session()->has('message'))
                <div class="alert alert-info">{{ session()->get('message') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
                <div class="panel-body">
                    @include('common.errors')
                    {!! Form::open(array('action' => 'TaskController@postNew', 'class'=>'form-horizontal')) !!}

                    {{-- use the custom component bsText(bootstrap text)
                     that I defined in resouces/views/components/form/text.blade.php and whose signature
                     Form::component('bsText', 'components.form.text', ['textBoxName', 'labelText'=>'Label text', 'textBoxValue' => null, 'textBoxAttributes' => []]);
                     is defined in the boot method of app/Providers/AppServiceProvider.php
                     see C:/Users/Muyiwa/Desktop/IT materials/laravel tips/Laravel Collective.htm--}}

                    {{ Form::bsText('name','Task', old('name'), array('id' => 'name') )}}

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>ADD
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
                                        {!! Form::open(array('action' => array('TaskController@postDelete', $task->id), 'class'=>'form-horizontal')) !!}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>DELETE
                                        </button>
                                        {!! Form::close() !!}
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
