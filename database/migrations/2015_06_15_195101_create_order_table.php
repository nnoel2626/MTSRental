<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("order", function(Blueprint $table)
		{

			$table->increments("id");
			$table->integer("user_id");
			$table->dateTime("created_at");
			$table->dateTime("updated_at");
			$table->dateTime("deleted_at");
		});
	}

	public function down()
	{
		Schema::dropIfExists("order");
	}

}
