<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Category;

class Category extends Eloquent {

	protected $table = 'categories';
	protected $guarded = array('id','created_at', 'updated_at');

	protected $fillable = array('name');

	public static $rules = array('name'=>'required|min:3');
	
	public function equipment() {

	return $this->belongsToMany('App\Equipment');
	}

	

	public static function getIdNamePair() {
		$categories = Array();
		$collection = Category::all();
		foreach($collection as $category) 
			{
				$categories[$category->id] = $category->name;
			}
		return $categories;

		}

		# Model events...
		# http://laravel.com/docs/eloquent#model-events
		public static function boot() {
		parent::boot();
			static::deleting(function($category) 
			{
		DB::statement('DELETE FROM category_equipment WHERE category_id = ?',
		 array($category->id));
			});
		}

		public function scopeCategorized($query, Category $category=null) {
    	if ( is_null($category) ) return $query->with('categories');

    	$category_id = $category->getDescendantsAndSelf()->lists('id');

    	return $query->with('categories')
      ->join('category_equipment', 'category_equipment.equipment_id', '=', 'equipment.id')
      ->whereIn('category_equipment.category_id', $category_id);
  		}

}
