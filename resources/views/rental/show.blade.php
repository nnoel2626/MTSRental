@extends('layouts.default')

@section('title')
A
@stop
@section('head')
 {!! HTML::style('css/animate.css') !!} 
    {!! HTML::style('css/responsive.css') !!}  
  {!! HTML::style('css/font-awesome.min.css')!!}
  @stop

@section('content')


<h1>Equiment details</h1>
        @if(sizeof($equipment) == 0)
            No results
                @else
                @foreach($equipment as $equipment->id)
                <section class='equipment'>
                <div class='image'>
                <img src='/{{$equipment['image_path']}}'>

                <span><h2>{{ $equipment['name'] }}</h2></span>
				<span><h2>{{ $equipment['brand'] }}</h2></span> 
				<span><h2>{{ $equipment['model'] }}</h2></span>
				<span><p> {{ $equipment['serial_number'] }}</p></span>
				<span><h2>{{ $equipment['price'] }}</h2></span>
				<span><h2>{{ $equipment['quantity'] }}</h2></span>

                                                  
                    <a href="{{ action('RentalController@index') }}" class="btn btn-danger">return</a>
                 </section> 
            @endforeach 
        @endif 

@stop
 



