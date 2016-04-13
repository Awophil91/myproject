<div class="form-group">
    {!! Form::label($fileInputName, $labelText, array('class' => 'col-sm-3 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::file($fileInputName, $fileInputHtmlAttributesArray) !!}
    </div>
    @if($errors->has($fileInputName))
        <span style="color:#A94442" class="col-sm-6 help-block error-help-block">{{ $errors->first($fileInputName) }}</span>
    @else
        <span style="color:gray" class="col-sm-6">Not more than 4096KB(4MB)</span>
    @endif
</div>