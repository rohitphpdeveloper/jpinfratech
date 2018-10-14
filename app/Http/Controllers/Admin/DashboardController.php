<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Resolution;
use App\Model\Resolution_question;
use App\User;
class DashboardController extends Controller
{

	public function index() 
  {
  		$users_fd=User::where(['user_type'=>'1'])->count();
      $users_homebuyers=User::where(['user_type'=>'2'])->count();
      $resolutions=Resolution::where(['status'=>'active'])->count();
  		$resolution_questions=Resolution_question::where(['status'=>'active'])->count();
		 return view('admin/index',compact('resolutions','resolution_questions','users_fd','users_homebuyers'));
	}
    
  public function login()
  {
  	return view('admin/login');
  }


}
