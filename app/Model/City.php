<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	    public $timestamps = true;

	   protected $table = 'cities';

      protected $fillable = ['id','name','state_id'];
}
