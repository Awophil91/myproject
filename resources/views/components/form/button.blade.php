{{--<div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
        <button id="{{$buttonName}}" type="submit" class="btn btn-default" title="{{$toolTip}}">
            <i class="{{$iconClass}}"></i>{{$buttonText}}
        </button>
    </div>
</div>--}}

<div class="well well-sm col-sm-offset-3 col-sm-6">
    <button id="{{$buttonName}}" type="submit" class="btn btn-default" title="{{$toolTip}}">
        <i class="{{$iconClass}}"></i>{{$buttonText}}
    </button>
    <a class="btn btn-link pull-right" href="{{$backLink}}"><i class="glyphicon glyphicon-backward"></i>  BACK</a>
</div>