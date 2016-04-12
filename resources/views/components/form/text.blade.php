<div class="form-group">
    {!! Form::label($textBoxName, $labelText, array('class' => 'col-sm-3 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text($textBoxName, $textBoxValue, array_merge(array('class' => 'form-control'), $textBoxAttributes)) !!}
    </div>
    @if($errors->has($textBoxName))
        <span style="color:red" class="col-lg-offset-3 col-sm-6">{{ $errors->first($textBoxName) }}</span>
    @endif
</div>