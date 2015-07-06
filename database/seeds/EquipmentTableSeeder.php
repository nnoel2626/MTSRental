<?php 
use Illuminate\Database\Seeder;
use App\Equipment;
use App\Category;
use \DB;
class EquipmentTableSeeder extends DatabaseSeeder {
            public function run()
            {
            # Clear the tables to a blank slate
              # Disable FK constraints so that all rows can be deleted, even if there's an attachd FK
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                DB::statement('TRUNCATE equipment');
                DB::statement('TRUNCATE category_equipment');
                 
                $audiorecorder = new Equipment;
                $audiorecorder->name = 'audiorecorder';
                $audiorecorder->brand = 'Sony';
                $audiorecorder->model = 'L-185';
                $audiorecorder->serial_number = '123456';
                $audiorecorder->price = 1500;
                $audiorecorder->availability = 1;
                $audiorecorder->image_path = 'images/marantz_1.jpg';
                $audiorecorder->save();
                               
                $dongle = new Equipment;
                $dongle->name = 'dongle';
                $dongle->brand = 'Apple';
                $dongle->model = 'l-185';
                $dongle->price = 1500;
                $dongle->availability = 1;
                $dongle->image_path ='images/mac_dungle.jpg';
                $dongle->save();
                
                  # equipment
                 $laptop = new Equipment;
                 $laptop->name = 'laptop';
                 $laptop->brand = 'Dell';
                 $laptop->model = 'Latitude';
                 $laptop->serial_number = '123456';
                 $laptop->price = 1500;
                 $laptop->availability = 1;
                 $laptop->image_path ='images/dell_laptop.jpg';
                 $laptop->save();
                $mac  = new Equipment;
                $mac ->name = 'mac';
                $mac ->brand = 'Apple';
                $mac ->model = 'Mac-Pro';
                $mac ->serial_number = '123789';
                $mac->price = 1500;
                $mac->availability = 1;
                $mac ->image_path ='images/mac-pro.jpg';
                $mac ->save();
                $microphone = new Equipment;
                $microphone->name = 'microphone';
                $microphone->brand = 'Shure';
                $microphone->model = 'sm-58';
                $microphone->serial_number = '1255456';
                $microphone->price = 1500;
                $microphone->availability = 1;
                $microphone->image_path = 'images/shure_mic.jpg';
                $microphone->save();      
                $projector = new Equipment;
                $projector->name = 'projector';
                $projector->brand = 'Sanyo';
                $projector->model = 'wtc-500';
                $projector->serial_number = '1254566';
                $projector->price = 1500;
                $projector->availability = 1;
                $projector->image_path = 'images/sanyo_projector.jpg';
                $projector->save();
                
                $tripod = new Equipment;
                $tripod->name = 'tripod';
                $tripod->brand = 'Manfrotto';
                $tripod->model = 'T-25';
                $tripod->serial_number = '1254566';
                $tripod->price = 1500;
                $tripod->availability = 1;
                $tripod->image_path = 'images/tripod.jpg';
                $tripod->save();               
                $videocamera = new Equipment;
                $videocamera->name = 'videocamera';
                $videocamera->brand = 'Sony';
                $videocamera->model = 'ts4000';
                $videocamera->serial_number = '1254566';
                $videocamera->price = 1500;
                $videocamera->availability = 1;
                $videocamera->image_path = 'images/hdzoom_cam.jpg';
                $videocamera->save();
                
                $sound_system = new equipment;
                $sound_system->name ='sound_system';
                $sound_system->brand = 'Yamaha';
                $sound_system->model = 't-25';
                $sound_system->serial_number = '1254566';
                $sound_system->price = 1500;
                $sound_system->availability = 1;
                $sound_system->image_path = 'images/sound_system.jpg';
                $sound_system->save();
               
                $audiorecorder = App\Equipment::where('name','audiorecorder')->get()->first();
                $category = App\Category::where('name','=','audiorecorder')->first();
                $audiorecorder->categories()->attach($category->id);

                $category = App\Category::where('name', '=','dongle')->first();
                $dongle= App\Equipment::where('name','dongle')->get()->first();
                $dongle->categories()->attach($category->id);

                $category = App\Category::where('name', '=','laptop')->first();
                $laptop = App\Equipment::where('name','laptop')->get()->first();
                $laptop->categories()->attach($category->id);

                $category = App\Category::where('name', '=','mac')->first();
                $mac = App\Equipment::where('name','audiorecorder')->get()->first();
                $mac->categories()->attach($category->id);

                $category = App\Category::where('name', '=','microphone')->first();
                $microphone = App\Equipment::where('name','mac')->get()->first();
                $microphone->categories()->attach($category->id);
                
                $category = App\Category::where('name', '=','projector')->first();
                $projector = App\Equipment::where('name','projector')->get()->first();
                $projector->categories()->attach($category->id);

                $category = App\Category::where('name', '=','tripod')->first();
                $tripod = App\Equipment::where('name','tripod')->get()->first();
                $tripod->categories()->attach($category->id);

                $category = App\Category::where('name', '=','videocamera')->first();
                $videocamera = App\Equipment::where('name','videocamera')->get()->first();
                $videocamera->categories()->attach($category->id);
                
                 $category = App\Category::where('name', '=','sound_system')->first();
                 $sound_system = App\Equipment::where('name','sound_system')->get()->first();
                $sound_system->categories()->attach($category->id);
        }
 }