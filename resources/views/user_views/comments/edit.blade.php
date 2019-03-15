@extends('user_views.main')

@section('title',' | Edit Comment')

@section('nav-item')
<li class="nav-item active">
        <a class="nav-link" href="#"> <i class="fa fa-edit fa-1x fa-fw"></i> Comments_Edit</a>
      </li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        
        {!! Form::model($comment, ['route' => ['comments.update' , $comment->id] , 'method'=>'PUT']) !!}
        
        
        {!! Form::label('name', 'Name :',['style' => '   margin-top: 10px;']) !!}
        {!! Form::text('name', null, ['class' => 'form-control' , 'disabled' => 'disabled']) !!}
        
        {!! Form::label('email', 'Email :',['style' => '   margin-top: 10px;']) !!}
        {!! Form::text('email', null, ['class' => 'form-control' , 'disabled' => 'disabled']) !!}
        
        {!! Form::label('comment', 'Comment :',['style' => '   margin-top: 10px;']) !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
        
        
        
        
        {!! Form::submit('Save Changes', ['class' => 'btn btn-secondary btn-block' , 'style' => '   margin-top: 10px;']) !!}
        
        
        

        {!! Form::close() !!}
        
    </div>
</div>

    {!! Form::close() !!} 
@endsection