<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\OrderItem as OrderItem;

class OrderItem extends Eloquent {
	
 	protected $table = "order_item";

  protected $guarded = ["id"];

  protected $softDelete = true;

  public function equipment()
  {
    return $this->belongsTo("App\Equipment");
  }

  public function order()
  {
    return $this->belongsTo("App\Order");
  }
}

}
