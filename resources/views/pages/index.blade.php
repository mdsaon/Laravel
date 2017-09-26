@extends('layout.app')

@section('content')
<div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>Playing with Laravel Application</p>
        <p><a class="btn btn-primary btn-lg href="/login" role="button">Login</a><a class="btn btn-primary btn-lg href="/signup" role="button">Signup</a></p>
</div>
@endsection   
  
