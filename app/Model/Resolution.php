<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    public $timestamps = true;
	protected $table = 'resolutions';
    protected $fillable = ['event_id','agenda','startdate','enddate','start_time','end_time','resolutionfile','finalize','status','backup'];

   public function user()
   {
    return $this->belongsTo('App\User','user_id','id');
   }

   public function Resolution_category()
   {
    return $this->belongsTo('App\Model\Resolution_category','resolution_id');
   }
}
