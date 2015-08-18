 @extends('layout.main')

@section('head')
{{ HTML::style('css/default.css') }}   
 @stop

@section('content')
 <!--  <div class="container">  -->
            
<div class="panel-heading">Equipment List by Categories</div> 
        <table class="table table-striped">
        <thead>
            <tr>
            <th>Ctegories Name</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Serial Number</th>
            <th>Rent equipment</th> 
            </tr>
        </thead>
    <tbody>       
        <tr>
    @foreach($categories as $category)

    <td>{{{ $category->name}}}</td>

    @foreach($category->equipment as $equipment)
	 <div class="panel-body"> 
    <td>{{ $equipment['brand'] }}</td> 
    <td>{{ $equipment['model'] }}</td>
    <td>{{ $equipment['serial_number'] }}  </td>
       
    <td>
    <a href="{{ action('RentalController@getShow', $equipment->id) }}" class="btn btn-primary">Select</a>
    <a href="{{ action('RentalController@getIndex', $equipment->id) }}" class="btn btn-danger">cancel</a> 
    </td> 
    </tr> 
    @endforeach 
    @endforeach  
      
    </tbody>
    </table> 
    </div>            
@stop

