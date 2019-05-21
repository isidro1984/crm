<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

    /*    for ($i = 1; $i <= 10; $i++) {
		    DB::table('clients')->insert([
            	'first_name' => Str::random(10),
            	'last_name' => Str::random(10),
            	'email' => Str::random(5) .'@ '. Str::random(4) . '.com',            	
            	'avatar' => 'default-avatar.png',            	
        	]);
		} */

    }
}
