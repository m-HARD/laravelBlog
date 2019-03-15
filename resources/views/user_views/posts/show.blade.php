@extends('user_views.main')
@section('title',' | Show')
@section('nav-item')
<li class="nav-item active">
        <a class="nav-link" href="#"> <i class="fa fa-eye fa-1x fa-fw"></i> Posts_Show</a>
      </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <br>
                    <p class="lead">{!! $post->body !!}</p>
                    <br><br><br>
                    <div class="tags">
                        @foreach ($post->tags as $tag)
                            <span class="badge badge-dark">{{ $tag->name }}</span>
                        @endforeach
                    </div>



                    <table class="table" style="margin-top: 50px;">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Comment</th>
                            <th scope="col" style="padding-left: 76px;"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($post->comments as $comment)
                                <tr>
                                    <th scope="row">{{ $comment->name }}</th>
                                    <th>{{ $comment->email }}</th>
                                    <th>{{ $comment->comment }}</th>
                                    <th>
                                        @if ($comment->user_id == auth::user()->id)
                                            <a href="{{ route('comments.edit' , $comment->id) }}" class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
                                        @endif
                                            <a href="{{ route('comments.delete' , $comment->id) }}" class='btn btn-sm btn-danger pull-right'><span class='fa fa-trash'></span></a>   
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
        </div>

        <div class="col-md-4 animate-box fadeInUp animated " style="padding-left: 0px;padding-right: 0px;">
           <div style="background-color: whitesmoke;padding-left: 15px;padding-right: 15px;"><br>
                <b>Post Url :  </b><a href="{{ url("user/posts/blog/$post->slug") }}" class="lead">{{ url($post->slug) }}</a><br>
                <b>Category :  </b><i class="lead">{{ $post->category->name }}</i><br>
                <b>Create_at :  </b><i class="lead">{{ date('j-M-Y g:i:sa',strtotime($post->created_at)) }}</i><br>
                <b>Last Udated_at :  </b><i class="lead">{{ date('j-M-Y g:i:sa', strtotime($post->updated_at)) }}</i>
            
            <br><br><br>
            <div class="row">
                <div class="col-md-6">
                    {!! Html::LinkRoute('posts.edit' , 'Edit' , array($post->id) , array('class' => 'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::open(['route' => ['posts.destroy' , $post->id] , 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delate' , ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            
            <div class="row">
                    <div class="col-md-12">
                        {!! Html::LinkRoute('posts.index' , '>> See All Posts' , [] , array('class' => 'btn btn-light btn-block')) !!}
                    </div>
            </div>
            <br>
        </div>
        </div>
    </div>
@endsection