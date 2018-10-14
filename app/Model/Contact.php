<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = true;
	protected $table = 'contact_enquires';
    protected $fillable = ['name','email','mobileno','msg','backup'];
}
