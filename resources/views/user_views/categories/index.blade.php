@extends('user_views.main')

@section('title' , ' | All Categoris')

@section('stylesheet')<style>.pad{margin-top: 59px;}.sad{padding-top: 14px; padding-bottom: 13px;}</style>@endsection   

@section('content')
    
    <div class="row">
        <div class="col-md-8">
                <h1>Categories</h1>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4 pad">
            <div class="jumbotron sad">
                    {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
                        <h4>New Categories</h4>
                        <br>
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name', null ,['class'=>'form-control']) }}
                        <br>
                        {{ Form::submit('Create New Category',['class'=>'btn btn-primary btn-block']) }}
                    {!! Form::close() !!}
            </div>
        </div>
        


    </div>

    
@endsection