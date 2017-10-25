<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVideos extends Model
{
    public $timestamps = false;

    protected $table = 'user_videos';

    // protected $fillable = [
    //     'name','description'
    // ];
    // public function user_videos()
    // {
    //     return $this->hasMany('App\UserVideos');
    // }
}
