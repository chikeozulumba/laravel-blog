@extends('layouts.main')

@section('title', '| View Post')

@section('stylesheets')
    <link rel="stylesheet" href="http://blogtut.dev/css/font-awesome/css/font-awesome.min.css">
@endsection

@section('content')

    <h1 class="display-4">{{ $post->title }}</h1>
    <div class="row">
        <div class="col-md-8">
            <div id="post-body">
                <div class="row">
                    <div id="post_image" class="col-md-4">
                        @if($post->image != null)
                            <img src=" {{ asset('img/' . $post->image) }} " alt="{{ $post->title }}" width="200" height="250">
                        @else
                            <img src=" {{ asset('img/default.png') }} " alt="" width="200" height="250">
                        @endif
                    </div>
                    <div id="post-content" class="col-md-auto">
                        <p class="lead">
                            {!! $post->body !!}
                        </p>
                    </div>
                </div>
                <hr>
                <div class="tags">
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-default">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
                
                <div id="view_comments" style="margin-top:50px;">
                    @if(($post->comments()->count()) > 0)
                    <h2 class="display-8">{{ $post->comments()->count() }} Comment{{ ( ($post->comments()->count() > 1) ? "s":"") }}  </h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($post->comments as $comment)
                                <tr>
                                   <td> {{ date('M j, Y h:ia', strtotime($comment->updated_at)) }} </td>
                                   <td>{{ $comment->name }}</td>
                                   <td>{{ $comment->email }}</td>
                                   <td>{{ $comment->comment }}</td> 
                                   <td>
                                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary padding-a"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                        <a href="{{ route('comments.delete', $comment->id) }}" class="btn  btn-xs btn-warning"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                   </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     @else
                        <h2 class="display-8">No Comments</h2>
                    @endif
                </div>          
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
            <dl class="dl-horizontal">
                    <dt>Url: </dt>
                    <dd><a href="{{ route( 'blog.single', $post->slug ) }}"> {{ route( 'blog.single', $post->slug ) }} </a></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Created at: </dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last updated: </dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
    {{--  {{dd($post)}}  --}}
                @if($post->category != null)
                    <dl class="dl-horizontal">
                        <dt>Category: </dt>
                        <dd>{{ $post->category->name }}</dd>
                    </dl>
                @endif
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkroute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open([
                            'route' => ['posts.destroy', $post->id],
                            'method' => 'DELETE'
                        ]) !!}
                            {!! Form::submit('Delete ', [
                                'class' => 'btn btn-danger btn-block'
                                ]) 
                            !!} 
                        {!! Form::close() !!}
                    </div>
                    <div id="see_all_rows">
                        <div class="col-md-12">
                            {{
                                Html::linkroute('posts.index', 'All posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing'])
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--  <div id="confirm-delete">
   <div class="delete-start">
         <p class="lead">This comment will be deleted.</p>
   </div>
   <div class="delete-end">
        <a href="" class="btn btn-default"></a>
        <a href="" class="btn btn-danger"></a>
   </div>
</div>  --}}

@section('scripts')
    <script src="http://127.0.0.1:8080/HOST/blog-v1-23-08/js/alerts.js"></script>
@endsection