<?php namespace App\Http\Controllers;
use DB;
use Cart;
use App\Equipment;
use App\Category;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

	
class CartController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}	

	  private $DEFAULT_QTY = 1;


    /**
	 * Get the cart content
	 *
	 * @return CartCollection
	 */
    
	public function index()
	{
        $equipment = Cart::content();
        return view('cart.index', compact('equipment'))
        ->with('equipment', Cart::content() );
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	
	public function store() {

	$equipment  = Equipment::find( Input::get('id') );
	$quantity = Input::get('quantity');

	$cart = Cart::add( $equipment->id, $equipment->name, 
		  $this->DEFAULT_QTY, $equipment->price,
											[
						'image'=>$equipment->image_path,			
						] );

	//var_dump($quantity);
	//var_dump($equipment);	

	return Redirect()->to('cart/index');
	return Redirect::to('/cart.equipment.index') 
		->with('message', 'Equipment Created'); 
	return redirect()->route('cart.index');
	}

        
    
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(){	
		$i = 0;

       foreach ( Cart::contents() as $item ) {
			$quantity       = 'quantity' . $i ++;
			$item->quantity = Input::get( $quantity );
		}
		
  //       if($request->ajax()) return $results;
		// return Redirect::to( 'cart/index' );
		return redirect()->route('cart.index');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete( $rowid)
	{
      
      Cart::remove($rowid);
		//var_dump($cart);

        return redirect()->route('cart.index');
	}
    /**
     * Empty the cart.
     *
     * @param  int  $id
     * @return Response
     */
    public function clear()
    {
        Cart::destroy();
        return redirect()->route('cart.index');
    }
}




