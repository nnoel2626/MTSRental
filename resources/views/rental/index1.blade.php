 @extends('layouts.default')

@section('head')
 {{ HTML::style('css/default.css') }}   
 @stop

@section('content')
<h1>Category View</h1>
 <div>
View as:
<a href='/equipment/?format=json' target='_blank'>JSON</a> |
<a href='/equipment/?format=pdf' target='_blank'>PDF</a>
</div> 
<div class="container">
  
		@if(sizeof($equipment) == 0)
		No results
		@else 

 		@foreach($equipment as $equipment)
 		
		<section class='equipment'>
				<!-- <span><h2>{{ $equipment['name'] }}</h2></span>
				<span><h2>{{ $equipment['brand'] }}</h2></span> -->
				<span><h2>{{ $equipment['model'] }}</h2></span>
				<span><p> {{ $equipment['serial_number'] }} </p></span>

				@foreach($equipment['categories'] as $category)
				<span class='category'>{{{ $category->name }}}</span>
				@endforeach  

				<a href="{{action ('RentalController@getCategory', $category->id) }}">  
				<img src='/{{$equipment['image_path']}}'></a>
			<br>
			<br>
			<a href="{{ route ('rental.category', $category->id) }}" 
			class="btn btn-primary" role="button">Select from Category</a> 
		</section>
	@endforeach
@endif
</div>
                
            

 
@stop