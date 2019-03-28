<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Album extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $table = 'albums';
    protected $primaryKey = 'albumID';
    protected $fillable = ['title', 'imageName', 'slug', 'userID'];
}
