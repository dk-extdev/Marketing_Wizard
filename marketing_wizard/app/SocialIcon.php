<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialIcon extends Model
{
    protected $table = 'social_icons';

    protected $fillable =['facebook','twitter','google_plus','linkedin','youtube'];
}
