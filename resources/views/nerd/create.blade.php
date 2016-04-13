@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('nerds') }}">ALL NERDS</a></li>
@endsection

@section('content')
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Nerd
            </div>

            <div class="panel-body">
                <!-- if there are creation errors, they will show here -->
                @include('common.errors')

                {!! Form::open(array('url' => 'nerds', 'files'=>true, 'class'=>'form-horizontal')) !!}

                {!! Form::bsText('name','Name', old('name'), array('id' => 'name')) !!}
                {!! Form::bsText('email','Email', old('email'), array('id' => 'email')) !!}
                {!! Form::bsSelect('nerd_level','Nerd level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), old('nerd_level'), array('id' => 'nerd_level')) !!}
                {!! Form::bsFile('image','Image', array('id' => 'image')) !!}
                {!! Form::bsButton('btnAdd','ADD', 'fa fa-btn fa-plus', 'click to add nerd') !!}

                {{--<div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>ADD
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