@extends('user_views.main')

@section('title' , ' | All Posts')

@section('stylesheet')<style>.pad{margin-top: 18px;}</style>@endsection   

@section('content')
    
    <div class="row">
        <div class="col-md-10">
            <h1>All My Posts</h1>
        </div>
        <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class="btn btn-primary pad">Create New Post</a>
        </div>
        <div class="col-md-12"><hr class="my-4"></div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Create_At</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                        <?php $i =1;?>
                      @foreach ($posts as $post)
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ substr($post->title , 0 , 50) }}{{ strlen($post->title) > 50 ? " ...ReadMore>" : "" }}</td>
                        <td>{{ substr(strip_tags(str_replace('&nbsp;' , ' ' , $post->body )) , 0 , 50) }}{{ strlen(strip_tags(str_replace('&nbsp;' , ' ' , $post->body ))) > 50 ?  Html::LinkRoute('posts.show' , ' ...ReadMore' , array($post->id)) : "" }}</td>
                        <td>{{ date('j-M-Y',strtotime($post->created_at))}}</td>
                        <td>{{ $post->category->name}}</td>
                        <td>
                                <i class="fa fa-eye fa-1x fa-fw"></i><a href="{{ route('posts.show',$post->id) }}" class="btn btn-light btn-sm ">View</a><br>
                                <i class="fa fa-edit fa-1x fa-fw"></i><a href="{{ route('posts.edit',$post->id) }}" class="btn btn-light btn-sm">&nbsp;Edit&nbsp;</a>
                        </td>
                    </tr>
                    <?php $i++;?>
                        @endforeach
                  
                </tbody>
              </table>
             
        </div>
            <div class="col-md-12 text-center">
                <hr class="my-5">
                {!! $posts->links() !!}
            </div>
    </div>

    
@endsection