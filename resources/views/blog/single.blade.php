@extends('blog.main')
@section('title',' | $post->title')
@section('nav-item')
<li class="nav-item active">
<a class="nav-link" href="#"> <i class="fa fa-eye fa-1x fa-fw"></i> Posts_Show {{ $post->title }}</a>
      </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <br>
                <p class="lead">{{ $post->body }}</p>
        </div>
    </div>
@endsection