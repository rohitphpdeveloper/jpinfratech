<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	    public $timestamps = true;

	   protected $table = 'countries';

      protected $fillable = ['id','name'];
}
