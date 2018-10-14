<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resolution_log extends Model
{
      public $timestamps = true;

	   	protected $table = 'resolution_log';

      	protected $fillable = ['id','resolution_id','user_id','client_ip','mac_address','browser_property','backup'];


   public function user()
   {
    return $this->belongsTo('App\User','user_id','id');
   }

    public function resolution()
   {
    return $this->belongsTo('App\Model\Resolution','resolution_id','id');
   }

}
