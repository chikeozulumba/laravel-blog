@extends('layouts.main')


@section('title', '| All Categories')

@section('content')

    <div class="row">
    
        <div class="col-md-8">
            <h1 class="display-4">Categories</h1>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    </tr>

                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div> <!-- End of col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                {!! Form::open([
                    'route' => 'categories.store',
                    'method' => 'POST'
                ])!!}
                    <h2>Add Categories</h2>
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null , ['class' => 'form-control']) }}
                        <br>
                    {{ Form::submit('submit', ['class' => 'btn btn-primary ']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection