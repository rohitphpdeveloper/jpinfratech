<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = true;
	protected $table = 'blogs';
    protected $fillable = ['name', 'url','image','home','short_description','description','meta_title','meta_description','status'];
}
