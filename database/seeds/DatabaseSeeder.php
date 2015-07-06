<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		
		$this->call('UsersTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('EquipmentTableSeeder');
		$this->call("OrderTableSeeder");
		$this->call("OrderItemTableSeeder");
		$this->call("RolesTableSeeder");
	}
	public function getFaker()
	{
		if (empty($this->faker))
		{
			$faker = Faker\Factory::create();
			$faker->addProvider(new Faker\Provider\Base($faker));
			$faker->addProvider(new Faker\Provider\Lorem($faker));
		}

		return $this->faker = $faker;
	}

}
