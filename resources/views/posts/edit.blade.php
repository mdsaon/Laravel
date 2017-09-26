@extends('layout.app')

@section('content')
		<h3>Update Posts</h3>
		{!! Form::open(['action' => ['PostsController@update',$post->id],'method' => 'POST']) !!}
		<div class="form-group">
		  {{Form::label('title','Title')}}
		  {{Form::text('title',$post->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
		</div>
		<div class="form-group">
		   {{Form::label('body','Body')}}
		  {{Form::textArea('body',$post->body,['class' => 'form-control', 'placeholder' => 'Body'])}}
		</div>
		{{Form::hidden('_method','PUT')}}
		{{Form::submit('Submit',['class' =>'btn btn-primary'])}}
    	{!! Form::close() !!}
@endsection  