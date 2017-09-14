@extends('layouts.main')
<?php $titleTag = htmlspecialchars($post->title);?>
@section('title', "| $titleTag")

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="col-md-3">
                    @if($post->image != null)
                        <img src=" {{ asset('img/' . $post->image) }} " alt="" width="200" height="250">
                    @else
                        <img src=" {{ asset('img/default.png') }} " alt="" width="200" height="250">
                    @endif
                </div>
                <div class="col-md-6">
                    <h1>{{ $post->title }}</h1>
                    <p>{!! $post->body !!}</p>
                </div>
            </div>
            
            
            <hr>
            <p>Posted In: <strong>{{$post->category->name}}</strong></p>
        </div>
    </div>
{{--  <h6><strong>
                        {{ $comment->name }}
                    </strong></h6>
                    <p class="lead" style="font-size:12px;">{{ date('M j, Y h:ia', strtotime($comment->updated_at)) }}</p>
                    <p> {{ $comment->comment }}</p>  --}}
    <div id="comment" class="row">
        <div class="col-md-8 col-md-offset-2">
        <h2 class="lead">{{ $post->comments()->count() }} Comment{{( ($post->comments()->count() > 0) ? "s":"")}}</h2>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="http://localhost:8080/HOST/blog-v1-23-08/img/user.png" alt="" class="author-image">

                        <div class="author-name">
                            <h4 class="lead">
                                {{ $comment->name }}
                            </h4>
                            <p class="author-time">
                                {{ date( 'F nS, Y - g:ia',strtotime($comment->updated_at)) }}
                            </p>
                        </div>
                        
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top:50px">
        <h3 class="text-center">Add your comments</h3><br>
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>
                <br>

                <div class="col-md-12">
                    {{ Form::label('comment', 'Comment:', ['style' => 'margin-top: 20px']) }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Add Comment', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top: 20px']) }}
                </div>

            </div>
        </div>
    </div>




@endsection