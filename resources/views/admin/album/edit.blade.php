@extends('layouts.front')

@section('title')
Edit Album
@endsection

@section('header')
    Edit Existing Album - {{$album->Title}}
@endsection

@section('content')
    <div class="col-12">
        <h2>Edit Album</h2>
        <form action="{{route('products.update',$album->AlbumId)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 my-4">
                <label for="albumTitle">Album Title</label>
                <input type="text" name="albumTitle" id="albumTitle" value="{{$album->Title}}">
            </div>
            <div class="col-12 my-4">
                <label for="artist">Artist</label>
                <select name="artist" id="artist" value="{{$album->artist->ArtistId}}">
                    @foreach($artists as $artist)
                        <option value="{{$artist->ArtistId}}" @if($album->artist->ArtistId == $artist->ArtistId) selected @endif>{{$artist->Name}}</option>
                    @endforeach
                </select>
               
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Edit album">
            </div>
            
            
        </form>
    </div>


    
@endsection