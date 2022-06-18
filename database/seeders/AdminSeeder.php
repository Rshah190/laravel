<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Config;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email='admin@gmail.com';
        $count = User::where('email',$email)->count();
        if($count < 1)
        {
            $user=new User;
            $user->first_name='Mr';
            $user->last_name='Admin';
            $user->role_id=Config::get('constants.ROLES.Admin');
            $user->email=$email;
            $user->password=bcrypt('12345678');
            $user->status='1';
            $user->save();

        }
    }
}
