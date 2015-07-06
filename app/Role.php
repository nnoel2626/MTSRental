<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Role as Role;

class Role extends Eloquent {

	public function users ()
    {
        return $this->belongsTo('App\User');
    }

}
