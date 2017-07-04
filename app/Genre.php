<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'id', 'remember_token','api_token',
    ];
    public function movies()
    {
        return $this->belongsToMany('App\Movie','movie_genre')
          ->withTimestamps();
    }
}
