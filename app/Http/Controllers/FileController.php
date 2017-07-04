<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Actor;
use App\File;

class FileController extends Controller
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

        $hasFile = $request->hasFile('file');
        $type = $request->input('type');
        $type_id   = $request->input('type_id');
        if(!$hasFile){
            return response()->json([
                "error" => "file not uploaded",
                ]
            );  
        }

        if ($type == "actor" ){
            $target =  Actor::where('id',$type_id);
            if ($target->count() > 0){
                $file = $request->file->store('files');
                return File::create([
                    'type'          =>$type,
                    'type_id'       =>$type_id,
                    'dir'           => $file
                ]);

            }

        }else if ($type == "movie"){
            $target =  Movie::where('id',$type_id);
            if ($target->count() > 0){
                $file = $request->file->store('files');
                return File::create([
                    'type'          =>$type,
                    'type_id'       =>$type_id,
                    'dir'           => $file
                ]);

            }
        }
        return response()->json([
            "error" => "assosiated type not found",
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
