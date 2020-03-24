<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public $fillable = ['first_name','last_name','dob','user_name','password','email'];
}
