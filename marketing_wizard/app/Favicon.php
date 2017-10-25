<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favicon extends Model
{
    protected $table = 'favicons';

    protected $fillable = ['name'];
}
