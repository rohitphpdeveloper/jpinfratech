<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Resolution_answer extends Model
{
	    public $timestamps = true;

	   	protected $table = 'resolution_questions_answers';

      	protected $fillable = ['id','resolution_question_id','answer','backup'];
}
