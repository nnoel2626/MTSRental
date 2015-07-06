<?php namespace App\Http\Controllers;

use App\Equipment;
use App\Category;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
	/** 
     * Returns the total number of items in the 
     *  user's cart
     */

class CartController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}	

	/**
	 * Get the cart content
	 *
	 * @return CartCollection
	 */

	public function getCart() {
		return View ('/cart.cart')
		->with( 'equipment', \Gloudemans\Shoppingcart\Facades\Cart::content() );
	}
	
	public function postAddtoCart() { 
		$Equipment = Equipment::find(Input::get('id')); 
		$quantity = Input::get('quantity'); 
		Cart::insert(array( 
		'id'=>$Equipment->id, 
		'name'=>$Equipment->title, 
		'price'=>$Equipment->price, 
		'quantity'=>$quantity, 
		'image'=>$Equipment->image 
		)); 
		return Redirect::to('cart/cart'); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function showCart()
	{
		return View ('cart.show')
		->with('equipment', \Gloudemans\Shoppingcart\Facades\Cart::contents()); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *@param  int  $id
	 * @return Response
	 */ 
	 
	public function editCart()
	{
		$item = Cart::item($identifier); 
	 	$item->remove(); 
		return Redirect::to('/cart.cart'); 
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function updateCart($id)
	{
		//
	}

	public function postUpdateCart() {
		$i = 0;
		foreach ( Cart::contents() as $item ) {
			$quantity       = 'quantity' . $i ++;
			$item->quantity = Input::get( $quantity );
		}
		return Redirect::to( 'cart/checkout' );
	}
	

	public function getRemoveItem( $identifier ) {
		$item = Cart::item( $identifier );
		$item->remove();
		return Redirect::to( 'cart/cart' );
	}
	
	
	
}
