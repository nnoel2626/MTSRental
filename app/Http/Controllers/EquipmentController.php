<?php namespace App\Http\Controllers;

use App\Equipment;
use App\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

	/**
	 * @Resource("equipment")
	 *
	 * 
	 */

class EquipmentController extends Controller {

	public function __construct()
	{
		$this->middleware ('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){

	$equipment = Equipment::with('categories')->get(); 
	$categories = array(); 
	foreach(Category::all() as $category){ 
	$categories[$category->id] = $category->name; 
		} 
	 //var_dump($equipment);
	 	 return View('/admin.equipment.index') 
		 ->with('equipment', $equipment)
		 ->with('categories', $categories); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){	
	 $categories = Category::getIdNamePair();
		return View('/admin.equipment.create')
		->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Equipment $equipment)
	{
		$validator = Validator::make(Input::all(), Equipment::$rules); 
		if ($validator->passes()) { 
		$equipment = new Equipment; 

		$equipment->category_id = Input::get('category_id'); 
		$equipment->title = Input::get('title'); 
		$equipment->description = Input::get('description'); 
		$equipment->price = Input::get('price'); 
		$image = Input::file('image'); 

		$filename = time()."-".$image->getClientOriginalName(); 
		Image::make($image->getRealPath())
			->resize(468,249)->save(pub-lic_path().'/img/equipment/'.$filename); 
			$equipment->image = 'img/equipment/'.$filename; 
			$equipment->save(); 
		return Redirect::to('/admin.equipment.index') 
		->with('message', 'Equipment Created'); 
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		 try {
		 	
			$equipment = Equipment::findOrFail($id);
			 }
			 catch(Exception $e) {
			 return Redirect::to('/admin.equipment.index')
			 ->with('flash_message', 'equipment not found');
			 }
			 //var_dump($equipment);

			 return View('/admin.equipment.show')->with('equipment', $equipment);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Equipment $equipment)
	{
		try {
				$equipment = Equipment::findOrFail($equipment);
				}
				catch(Exception $e)
				{
				return Redirect::to('/admin.equipment.index')
				->with('flash_message', 'Equipment not found');
				}
			# Pass with the $Category object so we can do model binding on the form
			return View('/admin.equipment.edit', compact('equipment'));
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Equipment $equipment)
	{
		try {
			$equipment = Equipment::findOrFail(Input::get('id'));
			}
			catch(Exception $e) {
			return Redirect::to('/admin.equipment.index')
			->with('flash_message', 'equipment not found');
			}
			
			$equipment->name = Input::get('name');
			$equipment->save();
			return Redirect::action('EquipmentController@index')
			->with('flash_message','Your Equipment has been saved.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$equipment = Equipment::find(Input::get('id')); 
		 
		if ($equipment) { 
		File::delete('public/'.$equipment->image); 
		$Equipment->delete(); 
		return Redirect::to('/admin.equipment.index') 
		->with('message','Equipment Deleted'); 
		} 
		return Redirect::to('/admin.equipment.index') 
		->with('message','Something went wrong, please try again'); 
	}


	 public function postToggleAvailability() { 
			$equipment = App\Equipment::find(Input::get('id')); 
			if ($Equipment) { 
			$equipment->availability = Input::get('availability'); 
			$equipment->save(); 
			return Redirect::to('/admin.equipment.index')
				->with('message', 'Equipment Up-dated'); 
			} 
			return Redirect::to('/admin.equipment.index')
				->with('message', 'Invalid Equipment'); 
		} 
}
