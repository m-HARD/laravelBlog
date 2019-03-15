@extends('user_views.main')
<?php $postSlug = htmlspecialchars($post->slug); ?>
@section('title'," | $postSlug")
@section('nav-item')
<li class="nav-item active">
        <a class="nav-link" href="#"> <i class="fa fa-eye fa-1x fa-fw"></i> Post_{{ $post->title }}_Show</a>
      </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
                <h1>{{ $post->title }}</h1>
                <br>
                    <p >{!! $post->body !!}</p>
                    <br><hr>
                    <div class="tags">
                            <b>Tags :</b>
                        @foreach ($post->tags as $tag)
                            <span class="badge badge-dark">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    
                <b>Category :  </b><i class="lead">{{ $post->category->name }}</i><br>
                <b>Create_at :  </b><i class="lead">{{ date('j-M-Y g:i:sa',strtotime($post->created_at)) }}</i><br>
                <b>Last Udated_at :  </b><i class="lead">{{ date('j-M-Y g:i:sa', strtotime($post->updated_at)) }}</i>
        </div>
        <div class="col-md-2">
            <a href="{{ route('userAllPost') }}" class="btn btn-outline-secondary btn-block" style="margin-top: 11px">Show All Posts</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2" style="margin-top: 20px">
            <h3>Comment : <small>{{ $post->comments()->count() }}{{ $post->comments()->count() > 1 ? " Comments" : " Comment" }}</small></h3>
            @foreach ($post->comments as $comment)
                <div class="comments">
                    <div class="auther-info">
                        <div class="auther-image">
                            <img src="{{asset('images/avatar/about3.ico')}}" alt="" class="auther-img">
                        </div>
                        <div class="auther-name">
                            <h3>{{ $comment->name }}</h3>
                            <b>{{ $comment->created_at }}</b>
                        </div>
                    </div>
                    <div class="auther-comment">
                        <b>{{ $comment->comment }}</b>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row" style="margin-top: 50px">
        <div id="comment-form" class="col-md-8 offset-md-2">
            
            {{ Form::open(['route' => ['comments.store' , $post->id] , 'method' => 'POST']) }}
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name','Name :') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="col-md-6">
                        {{ Form::label('email', 'G-mail :') }}
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="col-md-12">
                    {{ Form::label('comment', 'Comment') }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control' , 'rows' => '4']) }}
                    
                    {{ Form::submit('add comment', ['class' => 'btn btn-outline-secondary btn-block' , 'style' => 'margin-top: 10px']) }}
                    </div>
                    
                    
                </div>
            {{ Form::close() }}
            
        </div>
    </div>

@endsection