@extends('layouts.front')

@section('title')
Add new Album
@endsection

@section('header')
    Add New Album
@endsection

@section('content')
    <div class="col-12">
        <h2>Add new Album</h2>
        <form action="{{route('products.store')}}" method="POST">
            @csrf
            <div class="col-12 my-4">
                <label for="albumTitle">Album Title</label>
                <input type="text" name="albumTitle" id="albumTitle">
            </div>
            <div class="col-12 my-4">
                <label for="artist">Artist</label>
                <select name="artist" id="artist">
                    @foreach($artists as $artist)
                        <option value="{{$artist->ArtistId}}">{{$artist->Name}}</option>
                    @endforeach
                </select>
               
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Add album">
            </div>
            
            
        </form>
    </div>
@endsection