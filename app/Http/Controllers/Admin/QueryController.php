<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Enquiry;
use App\User;
use App\Model\Category;
use App\Model\Contact;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquires=Enquiry::with('user')->with('category')->where('backup',0)->get();
        return view('admin.querieslist',compact('enquires'));
    }

     public function destroy($id)
    {
         Enquiry::destroy($id);
    }

    public function reply($id)
     {
       $question=Enquiry::where('id',$id)->first();
       return view('admin.quries_reply',compact('question'));
     }

      public function reply_answer(Request $request)
     {
        //update
        $enquires=Enquiry::with('user')->with('category')->get();
        Enquiry::where('id',$request->id)->update(['answer' =>$request->answer]);
       return redirect('admin/queries')->with('success','successfully add answer');
     }

     public function contact_query()
     {
        $contacts=Contact::where('backup',0)->get();
        return view('admin/contactlist',compact('contacts'));
     }
   
}
