{!! Form::open(array('url' => 'rental/addtocart')) !!}
                         {!! Form::hidden('quantity', 1) !!}
                         {!! Form::hidden('id', $equipment->id) !!}
                         <button type="submit" class="btn btn-default add-to-cart">
                             <i class="fa fa-shopping-cart"></i>ADD TO CART
                         </button>
{!! Form::close() !!}