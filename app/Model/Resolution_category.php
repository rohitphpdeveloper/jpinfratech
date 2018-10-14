<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Resolution_category extends Model
{
	    public $timestamps = true;

	   	protected $table = 'resolution_category';

      	protected $fillable = ['id','resolution_id','category_id','backup'];

      	
}
