<div class="form-group">
    {!! Form::label($textBoxName, $labelText, array('class' => 'col-sm-3 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text($textBoxName, $textBoxValue, array_merge(array('class' => 'form-control'), $textBoxAttributes)) !!}
    </div>
</div>