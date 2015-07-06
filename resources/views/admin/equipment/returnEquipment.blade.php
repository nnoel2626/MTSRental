 @extends('layout.main')

@section('head')
 <!-- {{ HTML::style('css/default.css') }}   
 @stop

@section('content')
<h1>Equipment</h1>




@foreach($equipment as $equipment)
<section class='equipment'>

@foreach($equipment['categories'] as $category)
<span class='category'>{{{ $category->name}}}</span> 
@endforeach


<p>{{ $equipment['brand'] }}</p>
<p> {{ $equipment['model'] }} </p>



<br> <br>

</section>
@endforeach
@endif -->
@stop