
<!-- <a href="{{ action('EquipmentController@getEdit', $equipment->id) }}" class="btn btn-default">Edit</a>
<a href="{{ action('EquipmentController@getDelete', $equipment->id) }}" class="btn btn-danger">Delete</a>
<a href="{{ action('EquipmentController@getCreate') }}" class="btn btn-primary">Add </a>
 -->




 <!-- <p> {{ $equipment['count'] }} </p>
<p> {{$equipment['serial_number'] }} </p> -->

{{@if($query)
<h2>You searched for {{{ $query }}}</h2>
@endif }}




<!-- <li><a href="{{ URL('/category/index') }}">Category List</a></li>-->