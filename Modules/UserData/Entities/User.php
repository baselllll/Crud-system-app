<?php

namespace Modules\UserData\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    protected $table='users';
    protected $fillable = ['name','email','password','phone'];
    
}
