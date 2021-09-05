@extends('layouts.front')

@section('title')
    Products
@endsection
@section('header')
    Welcome to products page
@endsection
@section('content')
    <div class="row">
        <div class="col-4">
        <h1 class="mb-5">Albums</h1>
        </div>
        <div class="col-4">
        <a href="{{route('products.create')}}" class="btn btn-success mb-5">Add New Album</a>
        </div>
    </div>
    
   <div class="row mb-5">
       <div class="col-12">
            
            <form action="{{route('products.index')}}" method="GET">
                <label for="artist">Artist</label>
                <select name="artist" id="artist">
                    @foreach($artists as $artist)
                        <option value="{{$artist->ArtistId}}">{{$artist->Name}}</option>
                    @endforeach
                </select><br>
                <label for="albumTitle">Album Title</label>
                <input type="text" name="albumTitle" id="albumTitle">
                <input type="submit" value="Submit" class="btn btn-success">
            </form>
            <a href="{{route('products.index')}}">Reset Filters</a>
       </div>
   </div>
            
    <div class="row">
    
    @foreach($albums as $album)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card p-4">
                <img class="card-img-top w-50 mx-auto" src="{{asset('img/vinyl.png')}}" alt="{{$album->Title}}">
                <h3 class="mx-auto mt-4">{{$album->artist->Name}}</h2>
                <p class="mx-auto">{{$album->Title}}</p>
                <a href="{{route('products.show',$album->AlbumId)}}" class="btn btn-success">About Album</a>
                <hr>
                @if(session()->has('user'))
                <a href="{{route('products.edit',$album->AlbumId)}}" class="btn btn-primary">Edit Album</a>
                
                <form action="{{route('products.destroy',$album->AlbumId)}}" method="POST" class="mt-3">
                    @csrf 
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete Album">
                </form>
                @endif
             
               
            </div>
        </div>
    @endforeach
    </div>
    <div class="col-12">
    {{$albums->links()}}
    </div>
@endsection
