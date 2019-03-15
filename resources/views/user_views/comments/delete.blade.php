@extends('user_views.main')

@section('title',' | Delete Comment')

@section('nav-item')
    <li class="nav-item active">
        <a class="nav-link" href="#"> <i class="fa fa-edit fa-1x fa-fw"></i> Comments_Delete</a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>DELETE THIS COMMENT ??!!!!</h3>
            <b>
                Name  : <small>{{ $comment->name }}</small> <br>
                Email : <small>{{ $comment->email }}</small> <br>
                Comment : <small>{{ $comment->comment }}</small>
            </b>
            {!! Form::open(['route' => ['comments.destroy',$comment->id] , 'method' => 'DELETE']) !!}
                {!! Form::submit("DELETE", ['class' => 'btn btn-block btn-danger' , 'style' => 'margin-top: 20px']) !!}
            {!! Form::close() !!} 
        </div>
    </div>
@endsection