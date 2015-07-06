<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Order as Order;

class Order extends Eloquent {

  protected $table = "order";

  protected $guarded = ["id"];

  protected $softDelete = true;

  public function user()
  {
    return $this->belongsTo("App\User");
  }

  public function orderItems()
  {
    return $this->hasMany("App\OrderItem");
  }

  public function equipment()
  {
    return $this->belongsToMany("App\Equiment", "App\order_item");
  }
}