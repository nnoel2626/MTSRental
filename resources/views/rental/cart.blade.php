@extends('layout.main')

@section('head')
{{ HTML::style('css/default.css') }}   
 @stop

@section('content')

<h1>your Cart</h1>

 <table class="table table-striped">
    
<thead>
    <tr>
    <th>Name </th>
    <th>amount</th>
    <th>Price</th>
    <th>Total</th>
    <th>Delete</th> 
    </tr>
</thead>

    <tbody>       
<tr>

    @foreach($cart_equipment as $cart_item)

    <td>{{ $cart_item->name}}}</td>	
    <td>{{ $cart_item->Equipment->name }}</td> 
    <td>{{ $cart_item->amount }}</td>
    <td>{{ $cart_item->Equipment->price}} </td>
     <td>{{ $cart_item->total }}  </td>
       
    <td>
    <!-- <a href="{{ action('RentalController@getShow', $equipment->id) }}" class="btn btn-primary">Select</a>
    <a href="{{ action('RentalController@getIndex', $equipment->id) }}" class="btn btn-danger">cancel</a>  
    <a href="{{URL::route('delete_book_from_cart', [$cart_item->id] )}}" class="btn btn-danger">Delete</a>-->
    </td> 
</tr> 
  @endforeach 

        <tr>
        <td></td>   
        <td>{{ Total }}</td> 
        <td>{{ $cart_total }}</td>
        </tr> 
</tbody>
</table>

</div>   




<br> <br>



@stop

{{ Form::open(['route' => 'cart']) }}
    <input type="hidden" name="path" value="{{ Request::path() }}">
    <input type="hidden" name="image" value="{{ $item->image }}">
    <input type="hidden" name="product" value="{{ $item->name }}">
    <input type="hidden" name="description" value="{{ $item->seo_description }}">
    <input type="hidden" name="qty" value="1">
    <input type="hidden" name="size" value="{{ Session::get('size') }}">
    <input type="hidden" name="colour" value="{{ Session::get('colour') }}">
    <input type="hidden" name="price" value="{{ $item->price }}">
    @if ($item->stock > 0)
        <button class="btn btn-success">Add to Bag</button>
    @else
        <a href="" class="btn btn-primary">Email us</a>
    @endif
{{ Form::close() }}
Then I have this which shows the items of the carts.

@foreach($items as $item)
    <tr>
        <td class="col-sm-8 col-md-6">
            <div class="media">
                <span class="thumbnail pull-left">
                    <img class="media-object" src="/uploads/product-images/{{$item->image}}" style="width: 72px; height: 72px;">
                </span>
                <div class="media-body">
                    <h4 class="media-heading">
                        <a href="{{ $item->path }}">{{ $item->name }}</a>
                    </h4>
                    <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                </div>
            </div>
        </td>
        <td class="col-sm-1 col-md-1" style="text-align: center">
            <input type="email" class="form-control" id="exampleInputEmail1" value="1">
        </td>
        <td class="col-sm-1 col-md-1 text-center"><strong>&pound;{{ $item->price }}</strong></td>
        <td class="col-sm-1 col-md-1">
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><h5>Subtotal</h5></td>
    <td class="text-right"><h5><strong>&pound;{{ $item->price }}</strong></h5></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><h3>Total</h3></td>
    <td class="text-right"><h3><strong>&pound;{{ Cart::total(false) }}</strong></h3></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td>
        <a href="/remove/{{ $item->identifier }}" class="btn btn-danger">
            <span class="glyphicon glyphicon-remove"></span> Remove
        </a>
    </td>
    <td>
        <a href="" class="btn btn-default">
            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
        </a>
    </td>