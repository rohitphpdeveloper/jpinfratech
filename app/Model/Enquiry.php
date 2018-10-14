<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    public $timestamps = true;
	protected $table = 'enquires';
    protected $fillable = ['user_id','category_id','question','answer','backup'];

 	public function user()
     {
     	return $this->belongsTo('App\User','user_id');
     }

 	 public function category()
     {
     	return $this->belongsTo('App\Model\Category','category_id');
     }

}
