<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Model\Resolution;
use App\Model\Category;
use App\Model\Resolution_category;
use App\Model\Resolution_question;
use App\Model\Resolution_log;
use App\Model\Enquiry;
use App\Model\Contact;
use App\Model\Result;


class BackupController extends Controller
{
    public function index()
    {   
        
        return view('admin/backup');

    }
    public function backup(Request $request)
    {
           Resolution::where('backup',0)->Update(['backup'=>1]);
           Resolution_category::where('backup',0)->Update(['backup'=>1]);
           Resolution_question::where('backup',0)->Update(['backup'=>1]);
           Resolution_log::where('backup',0)->Update(['backup'=>1]);
           Enquiry::where('backup',0)->Update(['backup'=>1]);
           Contact::where('backup',0)->Update(['backup'=>1]);
           Result::where('backup',0)->Update(['backup'=>1]);

           return response()->json('Backup Complete Successfully');
    }
    public function restore()
    {
           Resolution::where('backup',1)->Update(['backup'=>0]);
           Resolution_category::where('backup',1)->Update(['backup'=>0]);
           Resolution_question::where('backup',1)->Update(['backup'=>0]);
           Resolution_log::where('backup',1)->Update(['backup'=>0]);
           Enquiry::where('backup',1)->Update(['backup'=>0]);
           Contact::where('backup',1)->Update(['backup'=>0]);
           Result::where('backup',1)->Update(['backup'=>0]);

           return response()->json('Restore Successfully');
    }
       

}
