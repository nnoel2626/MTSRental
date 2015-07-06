@extends('layouts.default')

@section('title')
A
@stop

@section('head')
{{ HTML::style('css/default.css') }}   
 @stop

@section('sidebar')
@parent
<p>This is appended to the main sidebar.</p>
@stop

@section('content')
 <div class="page-header">
        <h1>All equipment in this category <small>Gotta catch 'em all!</small></h1>
    </div>

@if(sizeof($equipment) == 0)
<p>There are no Equipment! :(</p>
@else
 

<div class="panel-heading">Equipment List by Categories</div> 
        <table class="table table-striped">
        <thead>
            <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Serial Number</th>
            <th>Price</th>
              
             
            </tr>
        </thead>
    <tbody>       
        <tr>
    
    @foreach($equipment as $equipment)
	<div class="panel-body"> 
	<td>{{ $equipment['Name'] }}</td>
    <td>{{ $equipment['brand'] }}</td> 
    <td>{{ $equipment['model'] }}</td>
    <td>{{ $equipment['serial_number']}}</td>
     <td>{{ $equipment['price'] }}</td>  
    <td>
    
    <span><a href="{{ action('RentalController@show', $equipment->id) }}" class="btn btn-primary">Show</a></span>
    <span><a href="{{ action('RentalController@getView', $equipment->id) }}" class="btn btn-danger">View</a></span>
    <span><a href="{!! URL::action('CartController@getCart', $equipment->id) !!}" class="btn btn-primary">select</a></span>
    </td> 
    </tr> 
    @endforeach 

     
    </tbody>
    </table> 
    </div>            
 @endif
@stop


