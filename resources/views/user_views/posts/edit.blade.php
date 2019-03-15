@extends('user_views.main')

@section('title',' | Edit Post')

@section('nav-item')
<li class="nav-item active">
        <a class="nav-link" href="#"> <i class="fa fa-edit fa-1x fa-fw"></i> Posts_Edit</a>
      </li>
@endsection

@section('stylesheet')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
<style>.sad{padding-top: 0px;height: 172px;}</style>
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
{!! Form::model($post , array('route' => array('posts.update' , $post->id) , 'method' => 'PUT' , 'data-parsley-validate' => '')) !!}
    <div class="row">
            
                <div class="col-md-8">
                    {{ Form::label('title' , 'Title : ') }}
                    {{ Form::text('title' , null , ['class' => 'form-control form-control-lg' , 'required' => '' , 'maxlength' => "255"]) }}
                        <br>
                    {{ Form::label('slug' , 'Post Slug : ') }}
                    {{ Form::text('slug' , null , ['class' => 'form-control' , 'required' => '' , 'minlength' => '5' , 'maxlength' => "255"]) }}
                        <br>
                    {{Form::label('category_id','Category :')}}
                    {{Form::select('category_id', $categories , null , ['class'=>'form-control' , 'required' => ''])}}
                        <br>
                    {{Form::label('tags','Tags :')}}
                    {{Form::select('tags[]', $tags , null , ['class'=>'form-control select2_multi' , 'required' => '' , 'multiple' => 'multiple' ])}}
                        <br>
                    {{ Form::label('body' , 'Body : ') }}
                    {{ Form::textarea('body' , null , ['class' => 'form-control' , 'required' => '']) }}
                </div>

                <div class="col-md-4 animate-box fadeInUp animated jumbotron sad" style=""><br>
                   
                    <div class="">
                        <b>Create_at :  </b><i class="lead">{{ date('j-M-Y g:i:sa',strtotime($post->created_at)) }}</i><br>
                        <b>Last Udated_at :  </b><i class="lead">{{ date('j-M-Y g:i:sa', strtotime($post->updated_at)) }}</i>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Html::LinkRoute('posts.show' , 'Cancel' , array($post->id) , array('class' => 'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Save Changes' , ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    </div>
                    <br>
                 </div>
    </div>
    {!! Form::close() !!} 
@endsection

@section('javascript')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script>
        $('.select2_multi').select2();
    </script>
@endsection