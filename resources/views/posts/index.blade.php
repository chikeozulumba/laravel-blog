@extends('layouts.main')

@section('title', '| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h2>All Posts</h2>

        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>

        </div>
    </div>  {{--End of row--}}
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-inverse">
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr id="rowW">
                            <th>{{ $post->id }}</th>
                            <td id="titleW">{{ $post->title }}</td>
                            <td id="bodyW">{!! substr($post->body, 0, 50) !!}{{((strlen($post->body) > 50 ? "...":""))}}</td>
                            <td id="timeW">{{ date('M j, Y ', strtotime($post->created_at)) }}</td>
                            <td id="linkW" class="bs-component"> <p><a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning">Edit</a></p></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $posts->links(); !!}
            </div>       
        </div>
    </div>


@stop