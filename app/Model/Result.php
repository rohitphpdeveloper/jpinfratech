<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $timestamps = true;
	protected $table = 'results';
    protected $fillable = ['user_id','category_id','resolution_id','question_id','option_1','option_2','option_3','backup'];

    public function user()
    {
     return $this->belongsTo('App\User','user_id','id');
    }
    public function resolution()
    {
     return $this->belongsTo('App\Model\Resolution','resolution_id','id');
    }

}
