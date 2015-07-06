<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolesTableSeeder extends DatabaseSeeder {


        public function run(){
                
                DB::table('roles')->insert(
                        array(
                                array('name' => 'admin'),
                                array('name' => 'user'),
                                array('name' => 'owner'),                                
                        ));
        }

        

}