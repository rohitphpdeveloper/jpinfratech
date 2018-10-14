<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = true; 
    
    protected $fillable = [
        'name','description','url','sort','status','type','meta_title','meta_description'
    ];
}
