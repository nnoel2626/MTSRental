@extends('layouts.default')

@section('head')
 {!! HTML::style('css/animate.css') !!} 
    {!! HTML::style('css/responsive.css') !!}  
  {!! HTML::style('css/font-awesome.min.css')!!}
  @stop



@section('content')

<h1>Equipment information</h1>

<div class="equipment-information"><!--/equipment-information-->
              <div id="equipment-details">
               
                <h3><img src='/{{$equipment['image_path'] }}'></h3>
              <h2>{!! $equipment->name !!}</h2>
              <p>Web ID: {!! $equipment->id !!}</p>
              <h2><span><span>${!! $equipment->price !!}</span></h2>
              <h3>
                 {!! Form::open(['route'=>'cart.store'])!!}
                 {!! Form::hidden('id', $equipment->id) !!}
                 {!! Form::label('quantity', 'Quantity') !!}
                 {!! Form::select('quantity', [0, 1, 2], 1) !!}  
                </h3>
               
                <br>
                  <button type="submit" class="secondary-cart-btn">
                <i class="fa fa-shopping-cart"></i>ADD TO CART
                  </button>
                  {!! Form::close() !!}
                  <hr />
                 </span>

                </div>
              </div><!--/equipment-information-->

@stop