@extends('user_views.main')

@section('title' , ' | All Tags')

@section('stylesheet')<style>.pad{margin-top: 59px;}.sad{padding-top: 14px; padding-bottom: 13px;}</style>@endsection   

@section('content')
    
    <div class="row">
        <div class="col-md-8">
                <h1>Tags</h1>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4 pad">
            <div class="jumbotron sad">
                    {!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}
                        <h4>New Tags</h4>
                        <br>
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name', null ,['class'=>'form-control']) }}
                        <br>
                        {{ Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block']) }}
                    {!! Form::close() !!}
            </div>
        </div>
        


    </div>

    
@endsection