@extends('layouts.app')

@section('header')
<div class="page-header">
        <h1>Category / Show #{{$category->id}}</h1>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('categories.edit', $category->id) }}"><i class="glyphicon glyphicon-edit"></i> EDIT</a>
                <button type="submit" class="btn btn-danger">DELETE <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$category->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-backward"></i>  BACK</a>

        </div>
    </div>

@endsection