@extends('layouts.main')

@section('title', '| Contact Us')

@section('stylesheets')
    <link rel="stylesheet" href="http://blogtut.dev/css/font-awesome/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <h2 class="display-3">Contact Me</h2><br>
            <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}

                <div class="form-group">
                        <label for="name">Name:</label>
                        <input id="name" type="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input id="subject" type="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Type your message here..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-info">Submit   <i class="fa fa-envelope"></i></button>
            
            </form>
            <br><br>
        </div>
    </div>
@endsection
