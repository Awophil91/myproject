@extends('layouts.app')

@section('menu')
    <li><a href="{{ URL::to('nerds') }}">ALL NERDS</a></li>
@endsection

@section('content')
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit {{$nerd->name}}
            </div>

            <div class="panel-body">

                <!-- if there are creation errors, they will show here -->
                @include('common.errors')

                {!! Form::model($nerd, array('route' => array('nerds.update', $nerd->id), 'method' => 'PUT', 'files'=>true, 'class'=>'form-horizontal')) !!}

                <div class="text-center">
                    @if ($nerd->image_name != null)
                        <img style="width: 128px; height: 128px" class="img-thumbnail" src="{{ action('NerdController@getImage', array($nerd->id)) }}" />
                    {{--@else
                        <img class="img-thumbnail" src="{{ asset('images/nerd.gif') }}">--}}
                    @endif
                </div>
                <br/>

                {!! Form::bsText('name','Name', null, array('id' => 'name')) !!}
                {!! Form::bsText('email','Email', null, array('id' => 'email')) !!}
                {!! Form::bsSelect('nerd_level','Nerd level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), null, array('id' => 'nerd_level')) !!}
                {!! Form::bsFile('image','Image', array('id' => 'image')) !!}
                {!! Form::bsButton('btnSave','SAVE', 'fa fa-btn fa-save', 'click to save changes') !!}

                {{--<div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-save"></i>SAVE
                        </button>
                    </div>
                </div>--}}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\NerdRequest') !!}
@endsection