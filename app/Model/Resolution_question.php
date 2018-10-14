<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Resolution_question extends Model
{
	    public $timestamps = true;

	   	protected $table = 'resolution_questions';

      	protected $fillable = ['id','resolution_id','resolution_text','resolution_description','slug','option_1','option_2','option_3','status','backup'];

}
