<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create the equipment table
       Schema::create('equipment', function(Blueprint $table) {
			# AI, PK
			$table->increments('id');
		   # General data...
		   # Important! FK has to be unsigned because the PK it will reference is auto-incrementing
		   # Define foreign keys...
		   $table->string('name');
		   $table->string('brand');
		   $table->string('model');
		   $table->string('serial_number');
		   $table->decimal('price', 6,2);
		   $table->boolean('availability')->default(1);
		   $table->string('image_path');
		   # created_at, updated_at columns
		   $table->timestamps();
        });

       
        // Create the Categories table
        Schema::create('categories', function(Blueprint $table) {
			# AI, PK
			$table->increments('id');
			# General data....
			$table->string('name', 64);
			# created_at, updated_at columns
			$table->timestamps();
        });
		
		// Creates the category_equipment (Many-to-Many relation) table

        Schema::create('category_equipment', function (Blueprint $table) {

            $table->integer('category_id')->unsigned();
			$table->integer('equipment_id')->unsigned();

            $table->foreign('equipment_id')->references('id')->on('equipment')
            	->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');

             $table->primary(['category_id', 'equipment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::table('category_equipment', function (Blueprint $table) {
			$table->dropForeign('category_equipment_category_id_foreign');
            $table->dropForeign('category_equipment_equipment_id_foreign');
            
        });

        Schema::drop('category_equipment');
        Schema::drop('equipment');
        Schema::drop('categories');
    }

}
