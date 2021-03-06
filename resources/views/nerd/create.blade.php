@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><i class="glyphicon glyphicon-plus"></i> Nerds / Create</h3>
            </div>
            <div class="panel-body">
                <!-- if there are creation errors, they will show here -->
                @include('common.errors')
                {!! Form::open(array('url' => 'nerds', 'files'=>true, 'class'=>'form-horizontal')) !!}
                {{ Form::bsText('name','Name', old('name'), array('id' => 'name')) }}
                {{ Form::bsText('email','Email', old('email'), array('id' => 'email')) }}
                {{ Form::bsSelect('nerd_level','Nerd level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), old('nerd_level'), array('id' => 'nerd_level')) }}
                {{ Form::bsFile('image','Image', array('id' => 'image')) }}
                {!! Form::bsButton('btnAdd','ADD', 'fa fa-btn fa-plus', 'click to add nerd', route('nerds.index')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('Manager\Http\Requests\NerdRequest') !!}
@endsection