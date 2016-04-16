<div class="form-group @if($errors->has($textBoxName)) has-error @endif">
    {!! Form::label($textBoxName, $labelText, array('class' => 'col-sm-3 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text($textBoxName, $textBoxValue, array_merge(array('class' => 'form-control'), $textBoxHtmlAttributesArray)) !!}
    </div>
    @if($errors->has($textBoxName))
        <span style="color:#A94442" class="col-sm-offset-3 col-sm-6 help-block">{{ $errors->first($textBoxName) }}</span>
    @endif
</div>

{{--<span style="color:red" class="col-sm-offset-3 col-sm-6">--}}