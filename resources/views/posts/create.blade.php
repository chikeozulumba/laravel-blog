@extends('layouts.main')

@section('title', '| Create New Post')

@section('stylesheets')
    <link rel="stylesheet" href="http://blogtut.dev/css/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="http://127.0.0.1:8080/CDN/select2/css/select2.min.css">
@endsection



@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        <hr>

        {{-- Use laravel collective forms later --}}

        <form action="http://blogtut.dev/posts" method="POST" id="create_post" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div id="feedback1" class="form-group">
                <label for="title" value="Title">Title:</label>
                <input type="text" name="title" id="titleMessage" class="form-control" placeholder="Title of post..." maxlength="255">
                    <div class="form-control-feedback" id="feedback_message1">The title of your post needs to be long enough!!!</div>
                    <div class="form-control-feedback" id="feedback_message2">This is good enough.</div>
                    <div class="form-control-feedback" id="feedback_message3">Your post title cannot be left blank.</div>
                    <div class="form-control-feedback" id="feedback_message4">Your title should be 11 - 256 characters long.</div>
            </div>
            <br>

            <div id="category" class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="select_category" class="form-control">
                <option  value="0"></option>
                    @foreach($categories as $category)
                        <option  value="{!!$category->id!!}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <div id="tags" class="form-group">
                <label for="tag_id">Tags:</label>
                <select name="tags[]" id="select_tag" class="form-control select2-multi" multiple="multiple">
                <option  value="0"></option>
                    @foreach($tags as $tag)
                        <option  value="{!!$tag->id!!}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <div id="create_slugs">
               <label for="slug" value="slug">Slug:</label>
               <input type="text" name="slug" id="slugInput" class="form-control" placeholder="Slug title..." minlength="5" maxlength="255">
               <div class="form-control-feedback" id="feedback_message9">Slug title needs a minimum of 5 characters!</div>
            </div>
            <br>

            <div class="form-group">
                {{ Form::label('featured_image', 'Upload Featured Image:') }}
                {{ Form::file('featured_image', ['class' => 'form-control btn btn-primary']) }}
            </div>
            
            
            <div id="feedback_Mbody">
                <label for="body" value="body">Body:</label>
                <textarea type="text" name="body" id="bodyMessage" class="form-control" placeholder="Enter your post..." cols="30" rows="10"></textarea>
                <div class="form-control-feedback" id="feedback_message5">Your Post is empty, you cannot submit an empty post.</div>
                <div class="form-control-feedback" id="feedback_message6">Your Post needs to be more than 99 characters to be accepted!</div>
                <div class="form-control-feedback has-warning" id="feedback_message7"></div>
                <div id="feedback_message8">Your good to go!</div>
            </div>
            

        <button type="submit" id="submit" class="btn btn-primary btn-block" style="margin-top:20px;">Submit  <i class="fa fa-save" aria-hidden="true"></i></button>
        </form>

    </div>


@endsection

@section('scripts')

     <script src="https://cloud.tinymce.com/stable/tinymce.min.js?api-key=cvnfie7da80ewvvffjm2cpzbm69vj9igny6pno9w3yevyp92"></script>

    <script src="http://127.0.0.1:8080/CDN/select2/js/select2.min.js">
    </script>

    <script src="http://127.0.0.1:8080/HOST/blog-v1-23-08/js/form_validator.js"></script>

    <script type="text/javascript">
        $('.select2-multi').select2();

        tinymce.init({ 
            selector:'textarea',
            plugins: 'link code', 
            menubar: false, 
        });
    </script>
@endsection
