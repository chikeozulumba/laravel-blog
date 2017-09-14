@extends('layouts.main')

@section('title', '| Home')

@section('content')
{{--  {{ Auth::check() ? "Logged In" : "Logged Out" }}  --}}
    <div class="row">
        <div class="col-md-12 bs-component">
            <div class="jumbotron">
                <h1 class="display-4">Sample Blog</h1>
                <p class="lead">Test blog.</p>
                <p><a href="#" class="btn btn-primary btn-lg" role="button">Popular Post</a></p>
            </div>
        </div>
    </div><!-- End of header-->

    <div class="row">
        <div class="col-md-8">

                @foreach($posts as $post)
                    <div id="recent_posts" class="post">
                    <h3>{{ $post->title }}</h3>
                        <p class="lead">
                            {{ substr(strip_tags($post->body), 0, 300) }}
                    {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href=" {{ route( 'blog.single', $post->slug ) }} " class="btn btn-primary">Read More</a>
                    </div>
                    <hr>
                @endforeach

        </div>

        <div class="col-md-3 col-md-offset-1 pade-header">
            <h4 class="typography">Sidebar</h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis nesciunt, perferendis animi placeat a ad itaque perspiciatis nisi libero provident.
            </p>
        </div>
    </div>
@endsection
