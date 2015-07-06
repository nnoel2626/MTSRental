@extends('layouts.default')

@section('title')
A
@stop

@section('head')
{{ HTML::style('css/default.css') }}   
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

                @foreach($equipment['categories'] as $category)
                            <p><span class='category'>{{{ $category->name}}}</span></p> 
                            @endforeach

                            <p><em>{{$equipment->brand}}</em></p> 
                            <p>{{$equipment->model}}</p>
                            <p>{{$equipment->serial_number}}</p>
                            <p>{{$equipment->price}}</p>                    

                                                  
                    <a href="{{ action('EquipmentController@index', $equipment->id) }}" class="btn btn-danger">return</a>
                 </section> 
            @endforeach 
        @endif 

@stop






