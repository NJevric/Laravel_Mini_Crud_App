<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Genre;
use App\Models\Track;
use App\Models\Artist;
use Illuminate\Pagination\LengthAwarePaginator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data['artists'] = Artist::all();
        $this->data['genres'] = Genre::all();

        $this->data['albums'] = null;

        $data = Album::with(['artist','tracks']);

        if($request->has('artist')){
            $data = $data->whereHas('artist',function($query) use($request){
                $query->where('ArtistId',$request->artist);
            });
         
        }
        if($request->has('albumTitle')){
            $data = $data->where('Title','like','%'.$request->albumTitle.'%');
            
        }

        $this->data['albums'] = $data->paginate(16)->withQueryString();
        return view('front.products',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['artists'] = Artist::all();
        return view('admin.album.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = new Album;
        $album->AlbumId = Album::max('AlbumId') + 1;
        $album->Title = $request->albumTitle;
        $album->ArtistId = $request->artist;
        try{
            $album->save();
            return response()->redirectToRoute('products.index')->with('success','Success');
        }
        catch(\Exceptrion $e){
            \Log::error($e->getMessage());
            return response()->redirectToRoute('products.create')->with('error','Error');
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
        session()->put('albumId',$id);
        $this->data['album'] = Album::with(['tracks','artist'])->where('AlbumId',$id)->first();
        return view('front.product',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['album'] = Album::where('AlbumId',$id)->first();
        $this->data['artists'] = Artist::all();
        return view('admin.album.edit',$this->data);
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
        $album = Album::where('AlbumId',$id)->first();
        $album->Title = $request->albumTitle;
        $album->ArtistId = $request->artist;

        try{
            $album->update();
            return response()->redirectToRoute('products.index')->with('success','Edited');
        }
        catch(\Exceptrion $e){
            \Log::error($e->getMessage());
            return response()->redirectToRoute('products.create')->with('error','Error');
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
        $album = Album::where('AlbumId',$id)->first();

        try{
            $album->delete();
            return response()->redirectToRoute('products.index')->with('success','Deleted');
        }
        catch(\Exceptrion $e){
            \Log::error($e->getMessage());
            return response()->redirectToRoute('products.create')->with('error','Error');
        }
    }
}
