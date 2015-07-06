<?php 
use Illuminate\Database\Seeder;
use App\Equipment;
use App\Order;
use App\OrderItem;
use App\User;
use \DB;
class OrderItemTableSeeder extends DatabaseSeeder
{
  public function run()
  {
    $faker = $this->getFaker();

    $orders   = Order::all();
    $equipment = Equipment::all()->toArray();

    foreach ($orders as $order)
    {
      $used = [];
      

      for ($i = 0; $i < rand(1, 5); $i++)
      {
        $product = $faker->randomElement($equipment);

        if (!in_array($equipment["id"], $used))
        {
          $id       = $equipment["id"];
          $price    = $equipment["price"];
          $quantity = rand(1, 3);

          OrderItem::create([
              "order_id"   => $order->id,
              "equipment_id" => $id,
              "price"      => $price,
              "quantity"   => $quantity
          ]);

          $used[] = $equipment["id"];
        }
      }
    }
  }
}