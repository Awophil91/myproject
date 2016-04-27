@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('content/nerdsIndex.css') }}" />
@endsection

@section('content')
    @if (count($nerds) > 0)
        <div class="col-sm-offset-2 col-sm-8">
            <!-- will be used to show any messages -->
            @if (session()->has('message'))
                <div class="alert alert-info">{{ session()->get('message') }}
                    <button type="button" class="close" aria-hidden="true"> &times; </button>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        <i class="glyphicon glyphicon-align-justify"></i> Nerds
                        <a class="btn btn-success pull-right" href="{{ url('nerds/create') }}"><i class="glyphicon glyphicon-plus"></i> CREATE</a>
                    </h3>
                </div>
                <div class="panel-body">
                    @foreach($nerds as $key => $value)
                    <div class="item">
                            <div id="item-left">
                                @if ($value->image_name != null)
                                    <div id="image">
                                        <img class="img-thumbnail" src="{{ action('NerdController@getImage', array($value->id)) }}" />
                                    </div>
                                @else
                                    <div id="image">
                                        <img class="img-thumbnail"  src="{{ asset('images/nerd.gif') }}" />
                                    </div>
                                @endif
                                    <div style="float:left">
                                        <h3>{{$value->name}}</h3>
                                        {{$value->email}}
                                        <h4>Level: {{$value->nerd_level}}</h4>
                                    </div>
                            </div>
                            <div id="item-right">
                                <div style="float: left; padding-right:.5em; padding-top:.5em">
                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-xs btn-primary" href="{{ url('nerds/' . $value->id) }}">
                                        <i class="glyphicon glyphicon-eye-open"></i>SHOW
                                    </a>
                                </div>
                                <div style="float: left; padding-right:.5em; padding-top:.5em">
                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-xs btn-info" href="{{ url('nerds/' . $value->id . '/edit') }}">
                                        <i class="glyphicon glyphicon-edit"></i>EDIT
                                    </a>
                                </div>
                                <div style="float: left; padding-right:.5em; padding-top:.5em">
                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                    {!! Form::open(array('url' => 'nerds/' . $value->id)) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>DELETE
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <br style="clear:both" />
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-8">
            <div class="text-center">
                {!! $nerds->render() !!}
            </div>
        </div>
    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif
@endsection