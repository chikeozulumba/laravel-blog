@extends('layouts.main')

@section('title', '| Edit Comment')

@section('content')

    

    <div class="col-md-8 col-md-offset-2">

        <h1 class="display-8">Edit Comment</h1>
    
        {{ Form::model($comment, ['route' => ['comments.update', $comment->id] , 'method' => 'PUT']) }}

            {{ Form::label('name', 'Name', ['style' => 'margin-top: 25px;']) }}
            {{ Form::text('name', null,  ['class' => 'form-control', 'disabled' => 'disabled']) }}

            {{ Form::label('email', 'Email', ['style' => 'margin-top: 25px;'])}}
            {{ Form::text('email', null,  ['class' => 'form-control', 'disabled' => 'disabled']) }}

            {{ Form::label('comment', 'Comment', ['style' => 'margin-top: 25px;'])}}
            {{ Form::textarea('comment', null,  ['class' => 'form-control']) }}

            {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top:15px;']) }}
        {{ Form::close() }}
    
    </div>

@endsection