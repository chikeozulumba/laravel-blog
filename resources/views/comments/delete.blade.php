@extends('layouts.main')


@section('title', '| DELETE COMMENT')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <h1 class="display-4">Delete Comment</h1>
            <p>
                <strong>Name: </strong> {{ $comment->name }}
            </p>

            <p>
                <strong>Email: </strong> {{ $comment->email }}
            </p>

            <p>
                <strong>Comment: </strong> {{ $comment->comment }}
            </p>

            {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])}}
                {{ FOrm::submit('YES, delete this comment', ['class' => 'btn btn-lg btn-block btn-danger'])}}
            {{ Form::close()}}
        </div>
    </div>

@endsection