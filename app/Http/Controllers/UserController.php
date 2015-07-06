<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 * GET /post
	 *
	 * @return Response
	 */
	public function index()
	{	
		$roles = Role::all();
		
		$users = User::orderBy( 'created_at', 'DESC' )
		->paginate( 5 );
		return View('/admin.users.index' )
		->with( 'users', $users )
		->with( 'roles', $roles );
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /post/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View( '/admin.users.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /post
	 *
	 * @return Response
	 */
	public function store() {
		//Take all fields from post form and validate all fields
		$v = Validator::make( Input::all(), User::$rules );
		if ( $v->passes() ) {
			$user           = new User;
			$user->username = Input::get( 'username' );
			$user->email    = Input::get( 'email' );
			$user->password = Hash::make( Input::get( 'password' ) );
			if( Input::get( 'tel' ) ) {
				$user->tel = Input::get( 'tel' );
			}
			$user->save();
			return Redirect::route( 'users.index' );
		}
		return Redirect::back()->withErrors( $v );
	}

	/**
	 * Display the specified information about user.
	 * GET /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find( $id );
		$date = $user->created_at;
		setlocale( LC_TIME, 'Europe/Kiev' );
		$date = $date->formatlocalized( '%A %d %B %Y' );
		return View::make( 'users.show' )->with('user', $user)->with('date',$date);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /post/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find( $id );
		if(is_null($user)):
			return Redirect::route( 'users.index' );
		endif;
		return View::make( 'users.edit' )->with('user',$user);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except( Input::all(), '_method' );
		$v = Validator::make( $input, User::$rules );
		if($v->passes()):
			User::find( $id )->update( $input );
			return Redirect::route( 'users.index' );
		endif;
		return Redirect::back()->withErrors( $v );
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();
		return Redirect::route( 'users.index' );
	}
}