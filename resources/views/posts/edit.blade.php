@extends('layouts.main')

@section('title', '| Edit your blog post.')

@section('stylesheets')
    <link rel="stylesheet" href="http://blogtut.dev/css/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="http://127.0.0.1:8080/CDN/select2/css/select2.min.css">
@endsection

@section('content')
<div class="col-md-12">
    <h1>Edit Post</h1>
    <hr>
         
        {!! Form::model(
            $post,
            [
                'route' => [
                    'posts.update',
                    $post->id
                ],
                'method' => 'PUT',
                'id' => 'create_post',
                'files' => true
            ]
        )
        !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">    
            <div class="col-md-8">
                <div id="feedback1" class="form-group">
                     <label for="title" value="Title">Edit title:</label>
                    <input type="text" name="title" id="titleMessage" class="form-control" placeholder="Title of post..." maxlength="255" value="{{ $post->title }}">
                    <div class="form-control-feedback" id="feedback_message1">The title of your post needs to be long enough!!!</div>
                    <div class="form-control-feedback" id="feedback_message2">This is good enough.</div>
                    <div class="form-control-feedback" id="feedback_message3">Your post title cannot be left blank.</div>
                    <div class="form-control-feedback" id="feedback_message4">Your title should be 11 - 256 characters long.</div>    
                </div>
                <br>

                <div id="edit_category" class="form-group">
                <label for="category_id">Change category:</label>
                <select name="category_id" id="select_category" class="form-control">
                <option  value="0"></option>
                    @foreach($categories as $category)
                        <option  value="{!!$category->id!!}">{{ $category->name }}</option>
                    @endforeach
                </select>
                </div>
                <br>

                 {{ Form::label('tags', 'Tags:', ['class' => ''] ) }}

                 {{ Form::select('tags[]', $tags, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple'] ) }}
                 <br>
                 <style>
                    #edit_slugs{
                        margin-top: 10px
                    }
                 </style>
                <div id="edit_slugs" style="margin-bottom:20px">
                    <label for="slug" value="slug">Edit slug:</label>
                    <input type="text" name="slug" id="slugInput" class="form-control" value="{{ $post->slug }}" placeholder="Slug title..." minlength="5" maxlength="255">
                    <div class="form-control-feedback" id="feedback_message9">Slug title needs a minimum of 5 characters!</div>
                </div>
                <br>

                <div class="form-group">
                    {{ Form::label('featured_image', 'Upload Featured Image:') }}
                    {{ Form::file('featured_image', ['class' => 'form-control btn btn-primary']) }}
                </div>

                <div id="feedback_Mbody">
                    <label for="body" value="body">Edit body:</label>
                    <textarea type="text" name="body" id="bodyMessage" class="form-control" placeholder="Enter your post..." cols="30" rows="10">{{ $post->body }}</textarea>
                    <div class="form-control-feedback" id="feedback_message5">Your Post is empty, you cannot submit an empty post.</div>
                    <div class="form-control-feedback" id="feedback_message6">Your Post needs to be more than 99 characters to be accepted!</div>
                    <div class="form-control-feedback has-warning" id="feedback_message7"></div>
                    <div id="feedback_message8">Your good to go!</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created at: </dt>
                        <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Last updated: </dt>
                            <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkroute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-warning btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" id="submit" class="btn btn-success btn-block">Save Changes  <i class="fa fa-save" aria-hidden="true"></i></button>
                        </div>
                </div>
            </div>
         </div>
    {{-- </form>        --}}
    {!! Form::close() !!}
</div>

@stop

@section('scripts')

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?api-key=cvnfie7da80ewvvffjm2cpzbm69vj9igny6pno9w3yevyp92"></script>

    <script src="http://127.0.0.1:8080/CDN/select2/js/select2.min.js"></script>

    <script src="http://127.0.0.1:8080/HOST/blog-v1-23-08/js/form_validator.js"></script>

    <script type="text/javascript">
        $('.select2-multi').select2();

        //$('.select2-multi').select2().val().trigger('change');

        tinymce.init({ 
            selector:'textarea',
            plugins: 'link code', 
            menubar: false, 
        });
    </script>
@endsection