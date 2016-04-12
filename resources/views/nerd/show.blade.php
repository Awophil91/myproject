@extends('layouts.app')

@section('menu')
    <li><a href="{{ URL::to('nerds') }}">ALL NERDS</a></li>
@endsection

@section('content')
    <h1>Showing {{ $nerd->name }}</h1>

    <div class="jumbotron text-center">
        {{$nerd->image_name}}
        @if ($nerd->image_name != null)
            <div id="image">
                <img style="width: 75px; height: 75px" src="{{ action('NerdController@getImage', array($nerd->id)) }}" />
            </div>
        @else
            <div id="image">
                <img style="width: 75px; height: 75px" src="{{ asset('images/nerd.gif') }}" />
            </div>
        @endif
        <h2>{{ $nerd->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $nerd->email }}<br>
            <strong>Level:</strong> {{ $nerd->nerd_level }}
        </p>
    </div>
@endsection
