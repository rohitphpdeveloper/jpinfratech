<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Page;
use App\Model\Compnay;

class FrontController extends Controller
{
    public $request;
    public $pages;
     public function __construct()
     {
	    $this->category=collect([]);
	     $this->middleware(function ($request, $next)
	     {
			 $this->setFrontSettings();
			 return $next($request);
	     });
     }


     public function setFrontSettings()
     {
     	$pages=page::where('status', 'active')->orderBy('sort', 'ASC')->get();
     	view()->share('pages',$pages);
     }
}
