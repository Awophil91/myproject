{{--@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>
        --}}{{--<br><br>
        {!! Html::ul($errors->all()) !!}--}}{{--
    </div>
@endif--}}

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p>There were some problems with your input.</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif