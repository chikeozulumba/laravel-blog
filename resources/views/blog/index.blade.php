@extends('layouts.main')

@section('title', "| Blog Posts")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Blog Posts</h1>
            <hr>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="row">
        <div id="post-body" class="col-md-8 col-md-offset-2">
            <h2>{{ $post->title }}</h2>
            <i><h6>Published: {{ date('M j, Y h:ia', strtotime($post->created_at)) }}</h6></i>


            <p class="lead">{!! substr(strip_tags($post->body), 0, 250) !!}{{strlen(strip_tags($post->body)) > 250 ? '...' : ""}}</p>

            <a href="{{ route( 'blog.single', $post->slug ) }}">Read More</a>
        </div>
    </div>
    @endforeach

    <div class="col-md-12">
        <div class="text-center">
            {!! $posts->links(); !!}
        </div>
    </div>
@endsection