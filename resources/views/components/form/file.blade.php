<div class="form-group @if($errors->has($fileInputName)) has-error @endif">
    {!! Form::label($fileInputName, $labelText, array('class' => 'col-sm-3 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::file($fileInputName, $fileInputHtmlAttributesArray) !!}
    </div>
    @if($errors->has($fileInputName))
        <span class="col-sm-6 help-block">{{ $errors->first($fileInputName) }}</span>
    @endif
</div>