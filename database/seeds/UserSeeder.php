<?php

use App\Address;
use App\Model\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*    
        $user = User::create([
                'name' => 'ahmad',
                'email' => 'points4host@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
            ]);

            Profile::create([
                'user_id' => $user->id,
                'first_name' => 'ahmad',
                'last_name' => 'al rshidi',
                'sex' => 0,
                'phone' => 0,
            ]);

            Address::create([
                'user_id' => $user->id,
                'country' => Str::random(5),
                'city' => Str::random(5),
                'taital' => Str::random(5),
                'zip_code' => 0,
            ]);
            */
        //
        for ($i=0; $i < 50; $i++) {

            $text  = '01';
            $rand  = substr(str_shuffle($text),0,1);

            $user = User::create([
                'name' => Str::random(5),
                'email' => Str::random(5).'@a.com',
                'password' => Hash::make('12345678'),
            ]);

            Profile::create([
                'user_id' => $user->id,
                'first_name' => Str::random(5),
                'last_name' => Str::random(5),
                'sex' => $rand,
                'phone' => 0,
            ]);

            Address::create([
                'user_id' => $user->id,
                'country' => Str::random(5),
                'city' => Str::random(5),
                'taital' => Str::random(5),
                'zip_code' => 0,
            ]);
        }
    }
}
