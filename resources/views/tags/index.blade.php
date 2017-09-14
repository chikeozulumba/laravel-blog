@extends('layouts.main')


@section('title', '| All Tags')

@section('stylesheets')
    <link rel="stylesheet" href="http://127.0.0.1:8080/CDN/select2/css/select2.min.css">
@endsection

@section('content')

    <div class="row">
    
        <div class="col-md-8">
            <h1 class="display-4">Tags</h1>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                    </tr>

                </thead>

                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div> <!-- End of col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                {!! Form::open([
                    'route' => 'tags.store',
                    'method' => 'POST'
                ])!!}
                    <h2>Add Tag</h2>
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null , ['class' => 'form-control']) }}
                        <br>
                    {{ Form::submit('submit', ['class' => 'btn btn-primary ']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="http://127.0.0.1:8080/CDN/select2/js/select2.min.js">
    </script>
@endsection