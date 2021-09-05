<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'album';
    protected $primaryKey = 'AlbumId';
    public $timestamps = false;

    public function artist(){
        return $this->belongsTo(Artist::class,'ArtistId');
    }
    public function tracks(){
        return $this->HasMany(Track::class,'AlbumId');
    }
}
