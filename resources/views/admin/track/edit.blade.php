@extends('layouts.front')

@section('title')
    Add Track
@endsection
@section('header')
    Edit Track {{$track->Name}}
@endsection
@section('content')

<div class="row">
    <div class="col-12">
    
    <h1>Edit Track - {{$track->Name}}</h1>
    </div>
    <form action="{{route('tracks.update',$track->TrackId)}}" method="POST" class="col-8">
        @csrf
        @method('PUT')
        <label for="name">Track Title</label>
        <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="{{$track->Name}}"><br>
        <label for="mediaType">Media Type</label>
        <select name="mediaType" id="mediaType"  class="form-control">
            @foreach($mediaTypes as $mt)
                <option value="{{$mt->MediaTypeId}}" @if($track->MediaTypeId == $mt->MediaTypeId) selected @endif>{{$mt->Name}}</option>
            @endforeach
        </select>
        <br>
        <label for="genre">Genre</label>
        <select name="genre" id="genre"  class="form-control">
            @foreach($genres as $g)
                <option value="{{$g->GenreId}}" @if($track->GenreId == $g->GenreId) selected @endif>{{$g->Name}}</option>
            @endforeach
        </select>
        <br>
        <label for="composer">Composer</label>
        <input type="text" name="composer" placeholder="Composer" class="form-control" value="{{$track->Composer}}"><br>

        <label for="milliseconds">Milliseconds</label>
        <input type="text" name="milliseconds" id="milliseconds" class="form-control" placeholder="Milliseconds" value="{{$track->Milliseconds}}">

        <label for="bytes">Bytes</label>
        <input type="text" name="bytes" id="bytes" class="form-control my-4" placeholder="Bytes" value="{{$track->Bytes}}">

        <label for="price">Price</label>
        <input type="text" name="unitPrice" id="price" class="form-control" placeholder="UnitPrice" value="{{$track->UnitPrice}}">
        <br>
        <input type="hidden" name="albumId" value="{{session('albumId')}}">
        <input type="submit" class="btn btn-primary">
    </form>
</div>
@endsection