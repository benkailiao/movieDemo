<?php

use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
	        'name' => 'ben',
	        'email' => 'ben@gmail.com',
	        'password' => '$2y$10$fnByF6ipOxM2KPbV.D2gM.QVYKvY2TRWfyi3X0E58Eav1AJOuVPhq',
	        'api_token' => 'ZZCEVXzuipUdV4QVVWp42w5hJZNcJCipuN3dxxe5YVY1igiL2OLdK5cijfD8',
	        'remember_token' => null,
	        'created_at' => date("Y-m-d H:i:s"),
	        'updated_at' => date("Y-m-d H:i:s"),
	    ]);
    	for ($i = 0 ; $i < 50; $i++){
    		DB::table('movies')->insert([
	            'name' => str_random(10),
	            'rate' => rand(0,5),
	            'description' => str_random(50),
	            'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s"),
	        ]);
    	}
    	for ($i = 0 ; $i < 20; $i++){
    		DB::table('genres')->insert([
	            'name' => str_random(10),
	            'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s"),
	        ]);
    	}

    	for ($i = 0 ; $i < 80; $i++){
    		$time = mt_rand(strtotime('1927-01-01'),strtotime('2015-01-01'));
    		DB::table('actors')->insert([
	            'name' => str_random(10),
	            'birthday' => date("Y-m-d",$time),
	            'bio' => str_random(50),
	            'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s"),
	        ]);
    	}
    	for ($i = 0 ; $i < 100; $i++){
    		DB::table('movie_actor')->insert([
	            'movie_id' => mt_rand(1,50),
	            'actor_id' => mt_rand(1,80),
	            'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s"),
	        ]);
    	}
    	for ($i = 1 ; $i < 50; $i++){
    		DB::table('movie_genre')->insert([
	            'movie_id' => $i,
	            'genre_id' => mt_rand(1,20),
	            'created_at' => date("Y-m-d H:i:s"),
	            'updated_at' => date("Y-m-d H:i:s"),
	        ]);
    	}

    }
}
