@extends('layouts.default')

  
@section('content')
    <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                      <li><a href="#">Home</a></li>
                      <li class="active">Shopping Cart</li>
                    </ol>
                </div><!-- /breadcrumbs -->

        @if($equipment)


         

         {!! Form::open(array('route' => 'rental.checkoutForm', 'method'=>'get')) !!} 
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item - Equipment Name</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Remove item</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $i=0; ?>
                         @foreach($equipment as $equipment)
                            <tr>
                                <td class="cart_equipment">
                           
                 {!! HTML::image($equipment->image, $equipment->name,  
                                    array('width' => '110', 'height' => '110')) !!} 
                                </td>
                                <td class="cart_description">
                                    <h4>{!!$equipment->name!!}</h4>
                                    <p>Web ID: {!! $equipment->id !!}</p>
                                </td>
                                <td class="cart_price">
                                    <p>${!! $equipment->price !!}</p>
                                </td>
                            <td class="cart_quantity">
                            <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href=""> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity{!!$i++!!}" 
                            value="{!! $equipment->quantity !!}" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href=""> - </a>
                                    </div>
                                </td>
                            <td class="cart_total">
                                    
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="/cart/delete/{!! $equipment->id !!}">
                                    <i class="fa fa-times"></i></a>
                                </td>
                                 <!-- <td class="cart_clear">
                                    <a class="cart_clear" href="/cart/clear/{!! $equipment->identifier !!}">
                                    <i class="fa fa-times"></i></a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /table-responsive cart_info -->

        {!! HTML::link('/rental/index', 'Continue Shopping', array('class' => 'btn btn-default check_out')) !!}

         {!! HTML::link('/cart/clear', 'Clear Cart', array('class' => 'btn btn-danger clear-cart')) !!}
        {!! Form::submit('Checkout', array('class' => 'btn btn-primary check_out')) !!} 


        {!! Form::close() !!}
                 @else
                                <h3 class="text-center">Your shopping cart is empty.</h3>
                     @endif
            </div>
        </section> <!--/#cart_items-->
@stop