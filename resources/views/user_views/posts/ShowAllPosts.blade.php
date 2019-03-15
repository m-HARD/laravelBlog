@extends('user_views.main')

@section('title' , ' | All Posts')

@section('stylesheet')
<style>
    
.pad{margin-top: 18px;}
.linkic{list-style: none;}
.linkic:hover{color: blue;}
</style>
@endsection   

@section('content')
    
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
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
                    <th scope="col">Writer</th>
                    <th scope="col">Category</th>
                    <th scope="col">URL</th>
                    <th scope="col">Like</th>
                  </tr>
                </thead>
                <tbody>
                 @php
                     $r = false;
                 @endphp

                      @foreach ($posts as $post)

                      
                                 

                      <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ substr($post->title , 0 , 50) }}{{ strlen($post->title) > 50 ? " ...ReadMore>" : "" }}</td>
                            <td>{{ substr(strip_tags(str_replace('&nbsp;' , ' ' , $post->body )) , 0 , 50) }}{{ strlen(strip_tags(str_replace('&nbsp;' , ' ' , $post->body ))) > 50 ? " ...ReadMore>" : "" }}</td>
                            <td>{{ date('j-M-Y',strtotime($post->created_at))}}</td>
                            <td>
                            {{ $post->writer }}
                            </td>
                            <td>
                                {{ $post->category->name}}
                            </td>
                            <td>
                                 <a href="{{ url("user/posts/blog/$post->slug") }}" class="lead">GO</a>
                            </td>
                            <td>
                            <a href="{{route('post.like',$post->id)}}" class="linkic fa fa-thumbs-up fa-1x fa-fw" style="color:black;
                            @foreach ($post->likes as $like) 
                            @if ($like->post_id == $post->id)
                            {{($like->post_status==true) ? 'color:blue' : 'color:black'}}
                            @endif
                            @endforeach
                            "  onclick="style='color:red'"></a>
                            </td>
                    </tr>
                        
                        
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