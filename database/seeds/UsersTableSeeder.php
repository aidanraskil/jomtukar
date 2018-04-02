<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1000)->create()->each(function ($u) {
	        $u->profiles()->save(factory(App\Profile::class)->make());
	    });
    }
}
