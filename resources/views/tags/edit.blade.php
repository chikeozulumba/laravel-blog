@extends('layouts.main')

@section('title', "|Edit $tag->name ")

@section('content')
    <div class="col-md-8">
        {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
        {{Form::label('name', 'Title:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        <br>
        {{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
    </div>
    

@endsection