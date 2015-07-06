@extends('layouts.admin')

@section('head')
 {{ HTML::style('css/default.css') }}    
 @stop

@section('content')
<h1>Equipment</h1>
 <div>
View as:
<a href='/equipment/?format=json' target='_blank'>JSON</a> |
<a href='/equipment/?format=pdf' target='_blank'>PDF</a>
</div> 

	@if(sizeof($equipment) == 0)
	No results
	@else

	@foreach($equipment as $equipment)
	<section class='equipment'>

		@foreach($equipment['categories'] as $category)
	<span class='category'>{{{ $category->name}}}</span> 
	@endforeach
	
	<div class= 'image'>
	<img src='/{{$equipment['image_path']}}'>
	</div>
	<div class="caption">
	
	
				
	<p><span><em>{{$equipment->brand}}</em></span></p> 
	<p>{{$equipment->model}}</p>
	<p>{{$equipment->serial_number }}</p>
	<p>{{$equipment->price}}</p>

   <br>			

	</div>
		<p><a href="{{ route ('admin.equipment.show', $equipment->id) }}" class="btn btn-primary" role="button">view</a> 
		<p><a href="{{ route ('rental.show', $category->id) }}" class="btn btn-primary" role="button">rent</a> 
				
		</section> 

		@endforeach

	@endif
		
@stop