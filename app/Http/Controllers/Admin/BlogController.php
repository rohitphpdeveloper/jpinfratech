<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::get();
        return view('admin.blog',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required|string|max:255','short_description'=>'required','description'=>'required','image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
         
        $t=time();
        $imageName =  $t. '.' .$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(base_path() . '/public/images/blog/', $imageName);

       $blog=Blog::Create([
            'name'=>$request->name,
            'url'=>'',
            'home'=>$request->home,
            'image'=>$imageName,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'sort'=>$request->sort,
            'status'=>$request->status,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description
            ]);

        $url=str_replace('?','',$request->name);
        $url= preg_replace('/[^A-Za-z0-9\-] /','',$url);
        $url=str_replace(' ','-',$url);
        $url= strtolower($url);
        $url=$blog->id.'-'.$url;




        $blog->url=$url;
        $blog->save();

        return redirect('admin/blog/')->with('success', 'Successfully Add blog.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs=Blog::where('id',$id)->get();
        return view('admin.blog_show',compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $blogs=Blog::where('id',$id)->get();
        return view('admin.blog_edit',compact('blogs'));
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
        $this->validate($request,['name'=>'required|string|max:255','short_description'=>'required','description'=>'required']);

        $name= str_replace('  ', ' ', strtolower($request->name));
        $name = str_replace(' ', '-', $name); 
        $name= preg_replace('/[^A-Za-z0-9\-_]/', '', $name);
        $url=$id.'-'.$name;


         $blog=Blog::find($id);
         $blog->name=$request->name;
         $blog->url=$url;
         $blog->home=$request->home;
         $blog->short_description=$request->short_description;
         $blog->description=$request->description;
         $blog->status=$request->status;
         $blog->meta_title =$request->meta_title;
         $blog->meta_description=$request->meta_description;
         $blog->save();

        if($request->file('image'))
        {
               $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048']);  
                $imageName = time(). '.' .$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(base_path() . '/public/images/blog/', $imageName);


                 $file='public/images/blog/'.$blog->image;
                    if(file_exists($file))
                    {
                        @unlink($file);
                    }

                $blog->image=$imageName;
                $blog->save();



        }


        return redirect('admin/blog/')->with('success', 'Successfully update blog.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blog::find($id);
        $file='public/images/blog/'.$blog->image;
        if(file_exists($file))
        {
            @unlink($file);
        }

        Blog::where('id',$id)->delete();
    }
}
