<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;

class GenreController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input('name');

        return Genre::create([
                'name'          =>$name
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $genreData = Genre::where('id',$id)->first();
        if ($genreData == null || $genreData->count() == 0){
            return response()->json(
                [
                    'error' => 'no result'
                ]);
        }
        $mMovies  = $genreData->movies;
        $movieResult = [];
        $actorResult =[];
        foreach($mMovies as $movie){
            $movieResult[] = $movie->name;
            $movieActorList = $movie->actors;
            foreach ($movieActorList as $actor) {
                $actorResult[$actor->id] = $actor->name;
            }
        }
        $result = [
                    'Name'      => $genreData->name,
                    'Movies'    => $movieResult,
                    'Actors'    => array_values( $actorResult )
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
        //
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
