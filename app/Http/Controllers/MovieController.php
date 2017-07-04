<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Actor;
use App\File;

class MovieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'name', 'rate','description',
        $name 			= $request->input('name');
        $rate 			= $request->input('rate',0);
        $des 			= $request->input('description','');
        $genreName 		= $request->input('genre','');
        $actorsInput	= $request->input('actors','');

        if (!empty($name)){
			$movies = Movie::where(['name' => $name]);
			if ($movies->count() == 0){
				$newMovie = Movie::create([
	        		'name'			=>$name,
	        		'rate'			=>$rate,
	        		'description' 	=> $des
	        	]);

			}else{
				$newMovie = $movies->first();
			}
		}


		if (!empty($genreName)){
			$genre = Genre::firstOrCreate(['name' => $genreName]);
			$newMovie->genres()->save($genre);
		}
		if (!empty($actorsInput)){
        	$actorNames = explode(',',$actorsInput);
        	foreach ($actorNames as $key => $value) {
        		$mActor = Actor::firstOrCreate(
        			['name' 		=> $value]);
				$newMovie->actors()->save($mActor);
        	}
		}
		
        return $newMovie;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$movieData = Movie::where('id',$id)->first();
    	if ($movieData->count() == 0){
    		return response()->json(
    			[
    				'error' => 'no result'
    			]);
    	}
    	$mGenres  = $movieData->genres->first()->name;
    	$mActors  = $movieData->actors;
    	$mActorResult = [];
    	foreach ($mActors as $key => $actor) {
    		$mActorResult[] = $actor->name;
    	}
    	$image = File::where([
    		'type' 	=> 'movie',
    		'type_id' 	=> $id
    		])->first();
    	$mDir = '';
    	if ($image != null && $image->count()>0){
            $mDir = $image->dir;
        }
    	$result = [
        			'Name' 		=> $movieData->name,
        			'Genre'		=> $mGenres,
        			'Actors'    =>$mActorResult,
        			'Rating'	=> $movieData->rate,
        			'Description' => $movieData->description,
        			'images' 		=> $mDir,
        		];


        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
