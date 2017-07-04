<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\File;

class ActorController extends Controller
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
        //'name', 'birthday','bio',//,'image'
        $name = $request->input('name');
        $birthday = $request->input('birthday',date('Y-m-d'));
        $bio = $request->input('bio','');
        return Actor::create([
                'name'          =>$name,
                'birthday'          =>$birthday,
                'bio'   => $bio
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
        $actorData = Actor::where('id',$id)->first();
        if ($actorData == null){
            return response()->json(
                [
                    'error' => 'no result'
                ]);
        }
        $dobQuery = $actorData->birthday;

        if ($this->isDate($dobQuery) ) {
          // it's a date
            $dob = $actorData->birthday;
            $age = date('Y') - date('Y',strtotime($actorData->birthday));
        }else{
            $dob = 'n/a';
            $age = 'n/a';
        }
        $image = File::where([
            'type'  => 'actor',
            'type_id'   => $id
            ])->first();
        $mDir = '';
        if ($image != null && $image->count()>0){
            $mDir = $image->dir;
        }
        $result = [
                    'Name'          => $actorData->name,
                    'Birth Date'    => $dob,
                    'Age'           => $age,
                    'Bio'           => $actorData->bio,
                    'images'        => $mDir,
                ];
        return response()->json($result);
    }
    private function isDate($value) 
    {
        if (!$value) {
            return false;
        }

        try {
            new \DateTime($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
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
