<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $table = 'track';
    protected $primaryKey = 'TrackId';
    public $timestamps = false;

    public function genre(){
        return $this->belongsTo(Genre::class,'GenreId','GenreId');
    }
    public function mediaType(){
        return $this->belongsTo(MediaType::class,'MediaTypeId','MediaTypeId');
    }
    public function album(){
        return $this->belongsTo(Album::class,'AlbumId');
    }
}
