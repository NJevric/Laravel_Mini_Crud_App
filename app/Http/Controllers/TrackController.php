<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\MediaType;
use App\Models\Album;
use App\Models\Track;

class TrackController extends Controller
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
        $this->data['genres'] = Genre::all();
        $this->data['mediaTypes'] = MediaType::all();
        return view('admin.track.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $track = new Track;
        $track->TrackId = Track::max('TrackId') + 1;
       $track->Name = $request->name;
       $track->AlbumId = $request->albumId;
       $track->MediaTypeId = $request->mediaType;
       $track->GenreId = $request->genre;
       $track->Composer = $request->composer;
       $track->Milliseconds = $request->milliseconds;
        $track->Bytes = $request->bytes;
        $track->UnitPrice = $request->unitPrice;

        try{
            $track->save();
            return response()->redirectToRoute('products.index')->with('success','Success');
        }
        catch(\Exceptrion $e){
            \Log::error($e->getMessage());
            return response()->redirectToRoute('track.create')->with('error','Error');
        }
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
        $this->data['genres'] = Genre::all();
        $this->data['mediaTypes'] = MediaType::all();
        $this->data['track'] = Track::where('TrackId',$id)->first();
        return view('admin.track.edit',$this->data);
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
        $track = Track::where('TrackId',$id)->first();

        $track->Name = $request->name;
     
        $track->MediaTypeId = $request->mediaType;
        $track->GenreId = $request->genre;
        $track->Composer = $request->composer;
        $track->Milliseconds = $request->milliseconds;
         $track->Bytes = $request->bytes;
         $track->UnitPrice = $request->unitPrice;
        try{
            $track->update();
            return response()->redirectToRoute('products.index')->with('success','Success');
        }
        catch(\Exceptrion $e){
            \Log::error($e->getMessage());
            return response()->redirectToRoute('track.edit')->with('error','Error');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $track = Track::where('TrackId',$id)->first();

        try{
     
            $track->delete();
            return back()->with('success','Success');
        }
        catch(\Exceptrion $e){
            \Log::error($e->getMessage());
            return back()->with('error','Error');
        }
    }
}
