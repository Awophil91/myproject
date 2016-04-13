<div class="form-group">
    {!! Form::label($selectBoxName, $labelText, array('class' => 'col-sm-3 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select($selectBoxName, $keyValueArray, $selectedValue, array_merge(array('class' => 'form-control'), $selectBoxHtmlAttributesArray)) !!}
    </div>
    @if($errors->has($selectBoxName))
        <span style="color:red" class="col-sm-offset-3 col-sm-6">{{ $errors->first($selectBoxName) }}</span>
    @endif
</div>