@extends('layouts.front')

@section('title')
    Product
@endsection
@section('header')
    Welcome to album {{$album->Name}} page
@endsection

@section('content')

    <div class="col-12">
        <h2>{{$album->Title}}</h2>
        <a href="{{route('tracks.create')}}" class="btn btn-primary">Add Track To Album</a>
        <p>Artist : {{$album->artist->Name}}</p>
        <p>Songs: </p>
        <div class="row">
            @foreach($album->tracks as $track)
            <div class="col-4 card">
                <p>Track name: {{$track->Name}}</p>
                <p>Genre: {{$track->genre->Name}}</p>
                <p>Media Type: {{$track->mediaType->Name}}</p>
                <p>Duration: {{$track->Milliseconds / 1000}} seconds</p>
                <p>Megabytes: {{round($track->Bytes / 1024 / 1024, 2)}}</p>
                <a href="{{route('tracks.edit',$track->TrackId)}}" class="btn btn-primary">Edit Track</a>
                <form action="{{route('tracks.destroy',$track->TrackId)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete Track">
                </form>
            
            </div>
            
            
            @endforeach
        </div>
    </div>

@endsection