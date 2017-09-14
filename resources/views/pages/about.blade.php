@extends('layouts.main')

@section('title', '| About Laravel Blog')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 >About Me</h4><hr>
            <span><h3 class="display-3">{{ $data['fullname'] }}</h3>  <h6><a href="mailto:{{  $data['email'] }}"> {{ $data['email'] }} </a></h6></span><br>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, quas, dolore. Dolor voluptate deleniti molestiae expedita illum enim doloremque adipisci, voluptatibus necessitatibus dolorem ipsum tenetur accusantium quis mollitia nam aliquam. Laudantium veniam, veritatis dolorem in. Est in impedit, porro quis suscipit tempore eveniet cumque maxime, beatae enim alias aliquid blanditiis omnis, animi sint. Nulla facilis unde veritatis laboriosam delectus quod fugiat ipsam! Voluptatibus consectetur temporibus quos, vel facere minus placeat porro sint autem architecto velit dignissimos repellat eius optio iste omnis accusantium delectus consequuntur. Alias similique aliquam consectetur ratione repellendus, quaerat saepe illum, sunt natus veniam eveniet maiores cupiditate possimus consequuntur magnam error sint vero mollitia tempora hic maxime quod voluptates. Nisi eveniet magnam molestiae voluptas eligendi animi sint esse, perspiciatis. Earum dolor quod ipsa qui quisquam in corporis, sed et suscipit! Rem delectus quis ex earum eveniet nihil natus numquam similique explicabo maxime vero, esse saepe sapiente labore magnam.
            </p>
        </div>
    </div>
@endsection
