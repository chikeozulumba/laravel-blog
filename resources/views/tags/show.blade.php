@extends('layouts.main')

@section('title', "| $tag->name Tag")

@section('content')

    <div class="row">
        <div class="col-md-8 ">
            <h1 class="display-4">{{ $tag->name}}, <small>{{$tag->posts()->count()}} Posts</small></h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn  btn-primary pull-right" style="margin-left: 100px; margin-top:16px;">Edit tag</a>
        </div>

        <div class="col-md-2">
            {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger ', 'style' => 'margin-left: 50px; margin-top:16px;']) }}
            {{ Form::close() }}
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tag->posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                <span class="badge badge-default">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm ">View</a>
                            <a href=""></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection