<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Model\Admin;
use App\Model\Category;
use Excel;
use Validator;
class SubadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subadmin=Admin::where('admin_type', '<>',  0 )->get();
        return view('admin.sub_admin',compact('subadmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::get();
        return view('admin.subadmin_create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, ['name' => 'required|string|min:3|max:255','email' =>'required|string|email|max:255|unique:admins','password' => 'required|min:8','admin_type' =>'required']);
         $user= Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'admin_type' => $request->admin_type,
            'status' => $request->status
        ]);
           return redirect('admin/sub_admin/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::get();
        $sub_admin=Admin::where(['id'=>$id])->first();

        //$users=Admin::with('usertype')->where('id',$id)->first();
        return view('admin.subadmin_create',compact('sub_admin','category')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, ['name' => 'required|string|min:3|max:255','email' =>'required|string|email|max:255','admin_type' =>'required']);
      
            Admin::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'admin_type' => $request->admin_type,
            'status' => $request->status
            ]);
            return redirect('admin/sub_admin/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
       echo json_encode(array('status' =>200 ,'message'=>'successfully deleted'));
    }

}
