<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	    public $timestamps = true;

	   	protected $table = 'states';

      	protected $fillable = ['id','name','country_id'];
}
