<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
    public $fillable = ["firstname", "lastname", "email"];
    
}