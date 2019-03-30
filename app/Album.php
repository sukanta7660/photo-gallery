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

    public function scopeSearch($query, $search){
        return $query->where('title','like','%'.$search.'%');
    }
}
