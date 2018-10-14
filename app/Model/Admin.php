<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
	public $remember_token=false;
    protected $fillable = ['name', 'email', 'password','admin_type','status'];

}
