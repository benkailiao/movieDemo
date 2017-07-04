<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name', 'rate','description',//,'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'id', 'remember_token','api_token',
    ];
    public function actors()
	{
	    return $this->belongsToMany('App\Actor','movie_actor')
	      ->withTimestamps();
	}
	public function genres()
	{
	    return $this->belongsToMany('App\Genre','movie_genre')
	      ->withTimestamps();
	}


}
