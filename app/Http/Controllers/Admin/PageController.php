<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=Page::all();
        return view('admin.page',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['name'=>'required|string|max:255','description'=>'required']);
        
         $name= str_replace('  ', ' ', strtolower($request->name));
         $name = str_replace(' ', '_', $name); 

         $name= preg_replace('/[^A-Za-z0-9\-_]/', '', $name);
         $url = str_replace('__', '_', $name); 
         $url=strtolower($url);


        Page::Create([
            'name'=>$request->name,
            'url'=>$url,
            'description'=>$request->description,
            'sort'=>$request->sort,
            'status'=>$request->status,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description
            ]);

        return redirect('admin/pages')->with('success','successfully add package');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages=Page::find($id);
         return view('admin.page_show',compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages=Page::find($id);
        return view('admin.page_edit',compact('pages'));
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
        
        $this->validate($request,['name'=>'required|string|max:255','description'=>'required']);
        
        
        $name= str_replace('  ', ' ', strtolower($request->name));
        $name = str_replace(' ', '_', $name); 

         $name= preg_replace('/[^A-Za-z0-9\-_]/', '', $name);
         $url = str_replace('__', '_', $name); 
         $url=strtolower($url);

         $pages=Page::find($id);
         $pages->name=$request->name;
         $pages->url=$url;
         $pages->description=$request->description;
         $pages->sort=$request->sort;
         $pages->status=$request->status;
         $pages->meta_title =$request->meta_title;
         $pages->meta_description=$request->meta_description;
         $pages->save();
         
         return redirect('admin/pages')->with('success','successfully add package');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Page::destroy($id);
        echo json_encode(array('status' =>200 ,'message'=>'successfully deleted'));
    }




}
