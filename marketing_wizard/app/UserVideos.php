<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVideos extends Model
{
    public $timestamps = false;

    protected $table = 'user_videos';
}
