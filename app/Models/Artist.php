<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artist';
    protected $primaryKey = 'ArtistId';
    public $timestamps = false;

    public function albums(){
        return $this->hasMany(Album::class,'ArtistId');
    }
}
