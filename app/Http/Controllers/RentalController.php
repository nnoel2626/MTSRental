<?php namespace App\Http\Controllers;

use App\Equipment;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RentalController extends Controller {
	public function __construct()
	{
			$this->middleware ('auth');
			
	}

		/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View($this->layout);
		}
	}
		

		/**
		 * Display a listing of the resource.
		 *	GET /store
		 * @return Response
		 */
		public function index()
		{
		$equipment = Equipment::with('categories')->get(); 
        $categories = array(); 
        foreach(Category::all() as $category){ 
        $categories[$category->id] = $category->name; 
        } 
     //var_dump($equipment);
         return View('/rental.index')
         ->with('equipment', $equipment)
         ->with('categories', $categories); 
		}
	
		public function getCategory($id){

		$equipment = Category::findOrFail($id)->equipment()
		 ->get();

		return View('/rental.category')
		->with('equipment', $equipment);
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */

		 public function getView($id) {
        return View('/rental.view')
        ->with('equipment', Equipment::find($id));
    	}

		public function show($id){
		 try {
		 	
			$equipment = Equipment::findOrFail($id);
			 }
			 catch(Exception $e) {
			 return Redirect::to('/rental.index')
			 ->with('flash_message', 'equipment not found');
			 }
			 //var_dump($equipment);

			 return View('/rental.show')->with('equipment', $equipment);
		}

	
	public function getSearch() {
		$keyword = Input::get( 'keyword' );

		return View('/rental.search' )
		->with( 'equipment', Equipment::where( 'title', 'LIKE', '%' . $keyword . '%' )
		->get() )
		->with( 'keyword', $keyword );
	}


	public function getCheckout() {
		return view ('/rental.checkout')
		->with( 'equipment', Cart::contents() );
	}

	public function postCheckout() {
		//Take all fields from post form
		$input = Input::all();
		$v     = Validator::make( $input, Checkout::$rules );
		if ( $v->passes() ) {
			$checkout    = Checkout::create( [
					'user_id'     => Auth::user()->id,
					'email'       => Input::get( 'email' ),
					'first_name'  => Input::get( 'first_name' ),
					'last_name'   => Input::get( 'last_name' ),
					'address'     => Input::get( 'address' ),
					'zip'         => Input::get( 'zip' ),
					'country'     => Input::get( 'country' ),
					'state'       => Input::get( 'state' ),
					'phone'       => Input::get( 'phone' ),
					'description' => Input::get( 'description' )
			] );
			$order_items = Cart::contents( true );
			foreach ( $order_items as $order ) {
				DB::table( 'order_item' )->insertGetId( [
						'order_id'   => $checkout->id,
						'product_id' => $order['id'],
						'quantity'   => $order['quantity'],
						'price'      => $order['price'],
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now()
				] );
			}
			return Redirect::to( '/rental/index' );
		}
		return Redirect::to( '/rental/checkout' )
		->withInput()->withErrors( $v )->withErrors( $v->getMessageBag() );
	}

	

	public function getContact() {
		return View::make( '/rental.contact' );
	}

	public function postContact() {
		$data = Input::all();
		$rules_contact = array(
				'name'    => 'required',
				'email'   => 'required|email',
				'subject'   => 'required|min:5',
				'message' => 'required|min:5'
		);

		$validator = Validator::make( $data, $rules_contact );
		if ( $validator->passes() ) {

			Mail::send( 'emails.contact', $data, function ( $message ) 
				use ( $data ) {
				$message->to( $data['email'], $data['name'] )
				->from( 'lagovskiy@gmail.com' )
				->subject( $data['subject'] );
			});

			// Redirect to page
			return Redirect::to( '/' )
					->with( 'message', 'Your message has been sent. Thank You!' );
		} else {
			//return contact form with errors
			return Redirect::back()->withErrors( $validator )
			->withErrors( $validator->getMessageBag() );
		}
	}
	
}





