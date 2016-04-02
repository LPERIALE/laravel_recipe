<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
		$names = ['admin','pippo','luca'];
		 
		$emails = ['admin@prova.com','pippo@prova.com','luca@prova.com'];
		 
		$passwords = [bcrypt('admin1'),bcrypt('pippo99'),bcrypt('luca99')];
		 
		$isadmins= [1,0,0];

		$users = [$names,$emails,$passwords,$isadmins];
        for($i = 0; $i<9;$i++){
            DB::table('users')->insert([
               'name' => $users[0][$i],
               'email' => $users[1][$i],
               'password' => $users[2][$i],
               'isAdmin' => $users[3][$i]
            ]);
           }
    
    }
}
