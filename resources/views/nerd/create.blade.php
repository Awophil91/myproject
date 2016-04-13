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
                <div class="form-group">
                    {!! Form::label('nerd_level', 'Nerd Level', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), old('nerd_level'), array('class' => 'form-control')) !!}
                    </div>
                    @if($errors->has('nerd_level'))
                        <span style="color:red" class="col-sm-offset-3 col-sm-6">{{ $errors->first('nerd_level') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Image', array('class' => 'col-sm-3 control-label')) !!}
                    <div class="col-sm-6">
                        {!! Form::file('image') !!}
                    </div>
                    @if($errors->has('image'))
                        <span style="color:red" class="col-sm-6">{{ $errors->first('image') }}</span>
                    @else
                        <span style="color:gray" class="col-sm-6">Not more than 4096KB(4MB)</span>
                    @endif
                </div>

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
    </div>
@endsection