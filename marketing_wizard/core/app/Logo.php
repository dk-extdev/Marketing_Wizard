<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = 'logos';

    protected $fillable = ['name'];
}
