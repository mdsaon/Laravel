@extends('layout.app')

@section('content')
		<h3>Create Posts</h3>
		{!! Form::open(['action' => 'PostsController@store','method' => 'POST']) !!}
		<div class="form-group">
		  {{Form::label('title','Title')}}
		  {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
		</div>
		<div class="form-group">
		   {{Form::label('body','Body')}}
		  {{Form::textArea('body','',['class' => 'form-control', 'placeholder' => 'Body'])}}
		</div>
		{{Form::submit('Submit',['class' =>'btn btn-primary'])}}
    	{!! Form::close() !!}
@endsection  