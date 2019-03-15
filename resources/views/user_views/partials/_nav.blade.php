

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-top: 0px;padding-bottom: 0px;">
  <a class="navbar-brand" href="#" style="padding-left: 39px">laravel-Musab</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
            <a class="nav-link" href="/user/posts"> <i class="fa fa-home fa-1x fa-fw"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('posts') ? "active" : "" }}">
            <a class="nav-link" href="/user/posts/ShowAllPosts"> <i class="fa fa-list-ul fa-1x fa-fw"></i>All Posts</a>
            </li>
            <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
            <a class="nav-link" href="#"> <i class="fa fa-user-circle fa-1x fa-fw"></i> About</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
            <a class="nav-link" href="/user/myposts"> <i class="fa fa-comment fa-1x fa-fw"></i> Myposts</a>
            </li>
            <li class="nav-item {{ Request::is('posts') ? "active" : "" }}">
            <a class="nav-link" href="{{ route('categories.index') }}"> <i class="fa fa-list-ul fa-1x fa-fw"></i> Categories</a>
            </li>
            <li class="nav-item {{ Request::is('posts') ? "active" : "" }}">
            <a class="nav-link" href="{{ route('tags.index') }}"> <i class="fa fa-list-ul fa-1x fa-fw"></i> Tags</a>
            </li>

          @yield('nav-item')
      
          

    </ul>
    <div class=" my-2 my-lg-0">
        <ul class="navbar-nav mr-auto" >

            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user fa-1x fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </ul>
    </div>
  </div>
</nav>