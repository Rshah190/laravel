<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            $data=['Admin','User'];
            foreach($data as $row)
            {
                $count =Role::where('name',$row)->count();
                if($count < 1)
                {
                    Role::create([
                        'name'=>$row,
                        'status'=>'1'
                    ]);
                }
    
            }
        
       
    }
}
