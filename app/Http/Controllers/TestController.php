<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Job;
use App\Model\City;
use App\Model\Company;
use App\User;
use Helper;
use App\Model\Industry;
use App\Model\Category;
use App\Model\Jobtype;
use Carbon\Carbon;
use App\Model\Review;
use App\Model\Applyjob;
use App\Model\Savejob;
use App\Notifications\Newsavejob;
use mail;

class TestController extends Controller
{
    public function test()
    {
    	$user =User::where('id',Auth::user()->id)->first();
      	$user->notify(new Newsavejob());
       	echo 'hello';
    }

}
