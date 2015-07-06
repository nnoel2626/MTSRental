
 @extends('layout.main')

	@section('promo') 
		<section id="promo"> 
		<div id="promo-details"> 
		<h1>Today's Deals</h1> 
		<p>Checkout this section of<br /> 
		equipment at a discounted price.</p> 
		<a href="#" class="default-btn">Shop Now</a> 
		</div><!-- end promo-details --> 
		{{ HTML::image('img/promo.png', 'Promotional Ad')}} 
		</section><!-- promo --> 
	@stop 

@section('content') 
			<h2>New equipment</h2> 
			<hr> 
			<div id="equipment"> 
		<!-- @foreach($equipment as $equipment)  -->
	 @foreach($categories->equipment as $equipment) 
			<div class="equipment"> 
			<a href="/rental/view/{{ $equipment->id }}"> 

			{{ HTML::image($equipment->image, $equipment->title, 
				array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }} 
			</a> 
			<h3><a href="/rental/view/{{ $equipment->id }}">{{ $equipment->title }}</a></h3> 
			<p>{{ $equipment->description }}</p> 
			<h5> 
			Availability: 
			<span class="{{ Availability::displayClass($equipment->availabil-ity) }}"> 
			{{ Availability::display($equipment->availability) }} 
			</span> 
			</h5> 


			<p> 
			{{ Form::open(array('url'=>'rental/addtocart')) }} 
			{{ Form::hidden('quantity', 1) }} 
			{{ Form::hidden('id', $equipment->id) }} 

			<button type="submit" class="cart-btn"> 
			<span class="price">{{ $equipment->price }}</span> 
			{{ HTML::image('img/white-cart.gif', 'Add to Cart') }} 
			ADD TO CART 
			</button> 
			{{ Form::close() }} 
			</p>



			 
			</div> 
		@endforeach 
</div><!-- end equipment --> 
@stop

