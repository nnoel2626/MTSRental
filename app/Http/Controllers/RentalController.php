<?php namespace App\Http\Controllers;
use Carbon; 
use DB;
use Cart;
use App\Checkout;
use App\Equipment;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RentalController extends Controller {

	private $DEFAULT_QTY = 1;

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
		 *	GET /rental
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

    	/**
		 * Display the specified category.
		 *
		 * @param  int  $category_id
		 * @return Response
		 */
		public function getCategory($id){
		$equipment = Category::findOrFail($id)->equipment()->get();
		return View('/rental.category')
		->with('equipment', $equipment);
		}
			
		public function getSearch() {
		$keyword = Input::get( 'keyword' );
		return View('/rental.search' )
		->with( 'equipment', Equipment::where( 'title', 'LIKE', '%' . $keyword . '%' )
		->get() )
		->with( 'keyword', $keyword );
		}	

		/**
		 * Display form for checkout.
		 *
		 * 
		 * @return Response
		 */

		public function getCheckout() {
	
		return view ('/rental.checkoutForm')
		->with('equipment', Cart::content());
		}

		
		public function postCheckout() 
		{
			//Take all fields from post form
			$input = Input::all();

			// do the validation ----------------------------------
	    	// validate against the inputs from our form-------
			$validator = Validator::make( $input, Checkout::$rules );
			if ( $validator->fails() ) {
				// get the error messages from the validator
	        	$messages = $validator->messages();
	        	// redirect our user back to the form with the errors from the validator
	        	//var_dump($validator->messages());

	      	return redirect()->route('rental.checkoutForm')
				->withInput()->withErrors( $validator )
				->withErrors( $validator->getMessageBag());
			}
		else	
			{
				 // validation successful ---------------------------

				$checkout    = Checkout::create(
				 [
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

				$order_items = Cart::content( true );
				foreach ( $order_items as $order ) {
					DB::table( 'order_item' )->insertGetId( [
							'order_id'   => $checkout->id,
							'equipment_id' => $order['id'],
							// 'quantity'   => $order['quantity'],
							'price'      => $order['price'],
							'created_at' => Carbon::now(),
							'updated_at' => Carbon::now()
					] );
				}			
			 	var_dump($order_items);

				//redirect our user back to the form so they can do it all over again
				return redirect()->route('rental.index');	
			}
		}	
	

		public function getContact() {
		return View('/rental.contactForm');
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





	

	
	
	

	

	


