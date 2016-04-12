@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('content/site.css') }}" />
@endsection

@section('menu')
    <li class="active"><a href="{{ url('nerds') }}">ALL NERDS</a></li>
    <li><a href="{{ url('nerds/create') }}">NEW NERD</a>
@endsection

@section('content')
    @if (count($nerds) > 0)
        <div class="col-sm-offset-2 col-sm-8">
            <!-- will be used to show any messages -->
            @if (session()->has('message'))
                <div class="alert alert-info">{{ session()->get('message') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nerds
                </div>
                <div class="panel-body">
                    @foreach($nerds as $key => $value)
                    <div class="item">

                            <div id="item-left">
                                @if ($value->image_name != null)
                                    <div id="image">
                                        <img style="width: 75px; height: 75px" src="{{ action('NerdController@getImage', array($value->id)) }}" />
                                    </div>
                                @else
                                    <div id="image">
                                        <img style="width: 75px; height: 75px" src="{{ asset('images/nerd.gif') }}" />
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
                                    <a class="btn btn-small btn-success" href="{{ url('nerds/' . $value->id) }}">
                                        <i class="fa fa-btn fa-folder-open"></i>SHOW
                                    </a>
                                </div>
                                <div style="float: left; padding-right:.5em; padding-top:.5em">
                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-small btn-info" href="{{ url('nerds/' . $value->id . '/edit') }}">
                                        <i class="fa fa-btn fa-edit"></i>EDIT
                                    </a>
                                </div>
                                <div style="float: left; padding-right:.5em; padding-top:.5em">
                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                    {!! Form::open(array('url' => 'nerds/' . $value->id)) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>DELETE
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
    @endif
@endsection