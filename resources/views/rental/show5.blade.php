 @extends('layouts.default')

@section('head')
 {{ HTML::style('css/default.css') }}   
 @stop


@section('sidebar')
<div class="cart"> 
<p>This is appended 
to the main sidebar.</p>
<hr>
 @foreach($equipment  as $equipment)
	
				<h3>{{ $equipment['name'] }}</h3>
	    		   <h3>{{ $equipment['model'] }}</h3>
	    				
			<p>{{ $equipment['brand'] }} {{ $equipment['serial_number'] }}</p>
			<p>price: {{$equipment['price'] }}</p>
	
{{ Form::open(array('url'=>'rental/order', 'method' => 'post')) }} 
{{ Form::hidden('equipment->id') }}
{{ Form::hidden('quantity', 1) }}  
 @endforeach
<label for="">Amount</label>
				<select name="amount" id="">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
{{ Form::close() }}	


@section('content') 
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Add to your Cart</div>

		@foreach($categories->equipment as $equipment) 
		<div class="panel-body">
			<div class="equipment"> 
			<a href="/rental/show/{{ $equipment->id }}"> </a>
				<h3>{{ $equipment['name'] }}</h3>
	    		<h3>{{ $equipment['brand'] }}</h3> 
	    		<h3>{{ $equipment['model'] }}</h3>
	    		<h3>{{ $equipment['serial_number'] }}</h3> 
			
				<h3><img src='/{{$equipment['image_path'] }}'></h3>		

				<a class="prod-th show-quick" href="/products/akua-tank-dress" 
				title="Akua Tank Dress">
				      	<span class="thumb">
				  
				 <span class="quick-view" data-prdid="#prod-447945272">QUICK VIEW</span>
				 <span class="product-title">Akua Tank Dress 
				 <em>$ 32.00</em>   
				 </span> </a>	
			
		</div> 
		@endforeach  
	</div><!-- end equipment -->

					</div>
			</div>
		</div>
	</div>
</div> 
@stop



@stop

			


