<?php
use Illuminate\Database\Seeder;
use App\User as User;



class UsersTableSeeder extends DatabaseSeeder {
    
    public function run(){

                $admin_role = DB::table('roles')
                                        ->select('id')
                                        ->where('name', 'admin')
                                        ->first()
                                        ->id;
                
                $user_role = DB::table('roles')
                                        ->select('id')
                                        ->where('name', 'user')
                                        ->first()
                                        ->id;
                
                $owner_role  = DB::table('roles')
                                        ->select('id')
                                        ->where('name', 'owner')
                                        ->first()
                                        ->id;
                 
            $now = date('Y-m-d H:i:s');

                DB::table('users')->insert(
                        array(
                                array(  'name'  => 'Norcius Noel',
                                        'username' => 'Norcius',
                                        'email'  => 'mensah33@gmail.com',
                                        'password' => Hash::make('test'),
                                        'role_id'  => $admin_role
                                ),
                                array(  'name'  => 'Dave Harris',
                                        'username' => 'Dave',
                                        'email'  => 'daveh@user.com',
                                        'password' => Hash::make('test'),
                                        'role_id'  => $user_role
                                ),
                                array(  'name'  => 'John do',
                                        'username' => 'John',
                                        'email'  => 'johnd@owner.com',
                                        'password' => Hash::make('test'),
                                        'role_id'  => $owner_role
                                ),
                        ));
    }

       

}
        
   
