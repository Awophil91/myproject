@extends('layouts.app')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Products / Edit #{{$product->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ $product->name }}"/>
                    @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('category_id')) has-error @endif">
                    <label for="category_id-field">Category</label>
                    {!! Form::select('category_id', $categoriesArray, $product->category_id, array('id' => 'category_id-field', 'class'=> 'form-control')) !!}
                    @if($errors->has("category_id"))
                        <span class="help-block">{{ $errors->first("category_id") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('price')) has-error @endif">
                    <label for="price-field">Price</label>
                    <input type="text" id="price-field" name="price" class="form-control" value="{{ $product->price }}"/>
                    @if($errors->has("price"))
                        <span class="help-block">{{ $errors->first("price") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('description')) has-error @endif">
                    <label for="description-field">Description</label>
                    <input type="text" id="description-field" name="description" class="form-control" value="{{ $product->description }}"/>
                    @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <a class="btn btn-link pull-right" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i>  BACK</a>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('Manager\Http\Requests\ProductRequest') !!}
@endsection