<div class="form-group @if($errors->has($selectBoxName)) has-error @endif">
    {!! Form::label($selectBoxName, $labelText, array('class' => 'col-sm-3 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select($selectBoxName, $keyValueArray, $selectedValue, array_merge(array('class' => 'form-control'), $selectBoxHtmlAttributesArray)) !!}
    </div>
    @if($errors->has($selectBoxName))
        <span style="color:red" class="col-sm-offset-3 col-sm-6 help-block">{{ $errors->first($selectBoxName) }}</span>
    @endif
</div>