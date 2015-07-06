@extends('layouts.default')

@section('head')
 {{ HTML::style('css/default.css') }}    
 @stop
 
@section('content')
<div class="container">
		<h1>Home</h1>

				<div class="panel-body">
					You are logged in!
				</div>
</div>
@endsection
