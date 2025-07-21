<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable = ['user_id', 'password', 'user_name', 'auth_id'];
}