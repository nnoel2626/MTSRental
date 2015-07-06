<?php namespace App\Http\Controllers;
use App\Equipment;
use App\Category;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function __construct() {
		$this->beforeFilter(function(){
			View::share('catnav', Category::all());
		});
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	// protected function setupLayout()
	// {
	// 	if ( ! is_null($this->layout))
	// 	{
	// 		$this->layout = View($this->layout);
	// 	}
	// }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View('/admin.index');
		// ->with('users', $users)
	}

	
}
