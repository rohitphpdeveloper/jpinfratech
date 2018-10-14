<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	    public $timestamps = true;

	   	protected $table = 'categories';

      	protected $fillable = ['id','name','status'];
}
