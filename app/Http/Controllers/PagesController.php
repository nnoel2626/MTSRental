<?php namespace App\Http\Controllers;
 use App\Http\Requests;
 use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function contact()
	{
		return view('contact');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function location()
	{
		return view('location');
	}

	/*
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function price($id)
	{
		return view('price');
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

	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
 