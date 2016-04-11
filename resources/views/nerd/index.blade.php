@extends('layouts.app')

@section('content')
    @if (count($nerds) > 0)
        <div class="col-sm-offset-2 col-sm-8">
            <!-- will be used to show any messages -->
            @if (session()->has('message'))
                <div class="alert alert-info">{{ session()->get('message') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Nerds
                </div>
                <div class="panel-body">
                    <table class="table table-striped nerd-table">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Nerd Level</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach($nerds as $key => $value)
                            <tr>
                                <td class="table-text">{{ $value->name }}</td>
                                <td class="table-text">{{ $value->email }}</td>
                                <td class="table-text">{{ $value->nerd_level }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>

                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>

                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection