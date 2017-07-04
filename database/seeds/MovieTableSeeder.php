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
