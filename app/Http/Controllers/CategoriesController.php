<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller {

	public function __construct()
	{
		$this->middleware('admin');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();

		//var_dump($categories);

		return View ('/admin.categories.index')
		->with('categories',$categories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View ('/admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Category::$rules);
		if( $validator->passes()){
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();
			
			return Redirect::to('/admin.category.index')
			->with('flash_message','Your categor been added.');
			}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 try {
		$category = Category::findOrFail($id);
		 }
		 catch(Exception $e) {
		 return Redirect::to('/admin.categories/')
		 ->with('flash_message', 'Category not found');
		 }
		 return View::make('/admin.categories/show')->with('category', $category);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try {
			$category = Category::findOrFail($id);
			}
			catch(Exception $e)
			{
			return Redirect::to('/admin.categories.index')
			->with('flash_message', 'Category not found');
		}
		# Pass with the $Category object so we can do model binding on the form
		return View('/admin.categories.edit')
		->with('category', $category);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try {
		$category = Category::findOrFail(Input::get('id'));
		}
		catch(Exception $e) {
		return Redirect::to('/admin.categories/')
		->with('flash_message', 'category not found');
		}
		
		$category->name = Input::get('name');
		$category->save();

		return Redirect::action('CategoriesController@index')
		->with('flash_message','Your Category has been saved.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try {
		$category = Category::findOrFail(Input::get('id'));
		}
		catch(Exception $e) {
		return Redirect::to('/admin.categories/')
		->with('flash_message', 'Category not found');
		}
		# Note there's a `deleting` Model event which makes sure 
		//category_equipmemt entries are also destroyed
		# See Category.php for more details
		Category::destroy(Input::get('id'));

		return Redirect::action('CategoriesController@index')
		->with('flash_message','Your Category has been deleted.');
	}

}