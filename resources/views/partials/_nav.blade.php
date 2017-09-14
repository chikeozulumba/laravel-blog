<div class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <a href="../" class="navbar-brand">Tech Blog</a>
            <ul class="navbar-nav">        
                <li class="nav-item {{ Request::is('/', 'about') ? 'active' : ''}}">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item {{ Request::is('/', 'blog') ? 'active' : ''}}">
                    <a class="nav-link" href="/blog">Blog</a>
                </li>

                <li class="nav-item {{ Request::is('/', 'contact') ? 'active' : ''}}">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>         
            </ul>

             <ul class="nav navbar-nav ml-auto">

                @if(Auth::check())
                    <li class="nav-item  {{ Request::is('/', 'posts') ? 'active' : ''}}">
                        <a class="nav-link" href="{{  route('posts.index')  }} ">Posts</a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ route('tags.index') }}">Tags </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                                                                                            document.getElementById('logout-form').submit();">Logout </a>
                    </li>
                @else
                    <li class="nav-item  {{ Request::is('/', 'register') ? 'active' : ''}}">
                        <a class="nav-link" href="/register">Register</a>
                    </li>

                    <li class="nav-item  {{ Request::is('/', 'login') ? 'active' : ''}}">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endif
            </ul>   
        </div>
    </div>
</div>