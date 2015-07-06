@extends('layouts.default')

@section('head')
 {!! HTML::style('css/animate.css') !!} 
    {!! HTML::style('css/responsive.css') !!}  
  {!! HTML::style('css/font-awesome.min.css')!!}
  @stop


@section('content')

  
        
       
        <div id="equipment-details">
         <h2>{!! $equipment['brand'] !!}</h2>

        <h2>{!! $equipment['name']  !!}</h2>
       
        <img src='/{{$equipment['image_path']}}'>

         <span><h3>{!! $equipment['model'] !!}</h3></span>
        <span><h3> {!! $equipment['serial_number'] !!}</h3></span>
        <span><h3>{!! $equipment['quantity'] !!}</h3></span>
        <hr />

        <form action="#" method="post">
        <label for="qty">Qty:</label>
        <input type="text" id="qty" name="qty" value="1" maxlength="2">
        <button type="submit" class="secondary-cart-btn">
        {!! HTML::image('img/white-cart.gif', 'Add to Cart') !!}
        ADD TO CART
        </button>
        </form>

        </div><!-- end equipment-details -->
        <div id="equipment-info">
         
        <p class="price">${!! $equipment->price !!}</p>
        <p>
            Availability:&nbsp;
            
        </span></p>
        <p>Equipment Code: <span>{!! $equipment->id !!}</span></p>
    </div><!-- end equipment-info -->

@stop
