<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<20;$i++){
        	$user=new User;
        	$user->name=str_random(10);
        	$user->password=Hash::make('iloveyou');

        	$user->save();
        }
    }
}
