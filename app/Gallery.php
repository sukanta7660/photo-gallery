<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $primaryKey = 'galleryID';
    protected $fillable = ['images', 'albumID', 'userID'];

    public function album(){
        return $this->belongsTo('App\Album','albumID');
    }
}
