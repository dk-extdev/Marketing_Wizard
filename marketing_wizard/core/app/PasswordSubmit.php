<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordSubmit extends Model
{
    protected $table = 'password_submits';

    protected $fillable = ['email','token','status'];
}
