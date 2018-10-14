<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $timestamps = true;
	protected $table = 'faqs';
    protected $fillable = ['question','description','status'];
}
