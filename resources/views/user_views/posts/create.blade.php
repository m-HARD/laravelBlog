@extends('user_views.main')
@section('title' , ' | Create')

@section('nav-item')
<li class="nav-item active">
        <a class="nav-link" href="#"> <i class="fa fa-edit fa-1x fa-fw"></i> Create_Post</a>
      </li>
@endsection

@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    {!! Html::script ('js/tinymce.min.js') !!}
   
  <script>
      tinymce.init({
           selector:'textarea',
           plugins: 'code link',
           menubar: false,
           mobile: { theme: 'mobile' }
      });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 shadow-lg p-3 mb-5 bg-white rounded animate-box fadeInUp animated">
            <h1>Create New Post</h1>
                <hr class="my-4">

            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
                {{Form::label('title','Title :')}}
                {{Form::text('title',null,array('class' => 'form-control' , 'required' => '' , 'maxlength' => "255"))}}

                {{Form::label('slug','Post Slug :',array('style' => 'margin-top:20px'))}}
                {{Form::text('slug',null,array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => "255"))}}

                {{Form::label('category_id','Category :',array('style' => 'margin-top:20px'))}}
                {{Form::select('category_id', $categories , null , ['class'=>'form-control' , 'required' => ''])}}

                {{Form::label('tags','Tags :',array('style' => 'margin-top:20px'))}}
                {{Form::select('tags[]', $tags , null , ['class'=>'form-control select2_multi' , 'required' => '' , 'multiple' => 'multiple' ])}}

                {{Form::label('body','Post Body :',array('style' => 'margin-top:20px'))}}
                {{Form::textarea('body',null,array('class' => 'form-control','placeholder' => 'type here...' ))}}
                
                {{Form::submit('Create Post',array('class' => 'btn btn-outline-success btn-lg btn-block' , 'style' => 'margin-top:20px'))}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('javascript')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script>
        $('.select2_multi').select2();
    </script>
@endsection


