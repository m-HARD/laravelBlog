@extends('user_views.main')

@section('title',' | Edit Tag')

@section('nav-item')
<li class="nav-item active">
        <a class="nav-link" href="#"> <i class="fa fa-edit fa-1x fa-fw"></i> Tags_Edit</a>
      </li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        
        {!! Form::model($tag, ['route' => ['tags.update' , $tag->id] , 'method'=>'PUT']) !!}
        
        
        {!! Form::label('name', 'Name :') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! Form::submit('Save Changes', ['class' => 'btn btn-secondary btn-block' , 'style' => '   margin-top: 10px;']) !!}
        
        
        

        {!! Form::close() !!}
        
    </div>
</div>

    {!! Form::close() !!} 
@endsection