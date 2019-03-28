<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $primaryKey = 'albumID';
    protected $fillable = ['title', 'imageName', 'userID'];
}
