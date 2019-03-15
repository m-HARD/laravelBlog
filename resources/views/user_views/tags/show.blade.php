@extends('user_views.main')

@section('title' , " | $tag->name Tag")

@section('stylesheet')<style>.pad{margin-top: 59px;}.sad{padding-top: 14px; padding-bottom: 13px;}</style>@endsection   

@section('content')
    
    <div class="row">

        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag in <small>{{ $tag->posts()->count() }}{{ $tag->posts()->count() > 1 ? " Posts" : " Post" }}</small></h1>
        </div>

        <div class="col-md-1">
            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-outline-primary btn-block pull-right" style="margin-top: 11px">Edit</a>
        </div>

        <div class="col-md-1">
            {{ Form::open(['route' => ['tags.destroy' , $tag->id] , 'method' => 'DELETE']) }}
                {{ Form::submit('Delete' , ['class' => 'btn btn-outline-danger btn-block' , 'style' =>  'margin-top: 11px;padding-left: 9px;'] ) }}
            {{ Form::close() }}
        </div>

        <div class="col-md-2">
            <a href="{{ route('tags.index') }}" class="btn btn-outline-secondary btn-block pull-right" style="margin-top: 11px">Show All Tags</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Post Id</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Tags</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                
                      @foreach ($tag->posts as $post)

                      
                                 

                      <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ substr($post->title , 0 , 50) }}{{ strlen($post->title) > 50 ? " ...ReadMore>" : "" }}</td>
                            <td>@foreach ($post->tags as $tag)
                                <span class="badge badge-dark">{{ $tag->name }}</span>
                            @endforeach</td>
                            <td style="padding-top: 5px;padding-bottom: 9px;"><a href="{{ route('posts.show',$post->id) }}" class="btn btn-outline-secondary pull-right btn-sm">View</a></td>
                            
                    </tr>
                        
                        
                        @endforeach
                </tbody>
              </table>
        </div>
    </div>

@endsection