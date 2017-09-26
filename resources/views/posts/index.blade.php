@extends('layout.app')

@section('content')
		<h3>Posts</h3>
	@if(count($posts) > 0)
		@foreach($posts as $post)
			<div class="well">
				<a href="/posts/{{$post->id}}"><h3>{{$post->title}}</h3></a>
				<small>Written ON {{$post->created_at}} by {{$post->user->name}}</small>
			</div>
		@endforeach
	@else
	 	<h5>No Posta Found</h5>
	@endif 	
@endsection  