<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Page;

use App\Model\Faq;

use App\Model\Blog;

use App\Model\Contact;

use App\User;





class HomeController extends FrontController

{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

 



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {

        $news=Blog::get();

        return view('index',compact('news'));

    }



    public function home()

    {

        return view('home');

    }

    

    //pages

    public function pages($slug)

    {

        $page=Page::where(['url'=>$slug,'status'=>'active'])->first();



        if(!empty($page)){

         return view('pages',compact('page'));

        }else{

           return view('404',compact('page'));  

        }

        

    }

    //Faq

    public function faq()

    {

        $faq=Faq::where(['status'=>'active'])->get();

        return view('faq',compact('faq'));

    }

    //Contact us

    public function contact()

    {

        return view('contactus');

    }



    public function contact_us(Request $request)

    {

       

        Contact::Create([

                'name'=>$request->name,

                'email'=>$request->email,

                'mobileno'=>$request->mobileno,

                'msg'=>$request->msg

            ]);

        return redirect('contact_us')->with('success','Your Query Send Successfully');;

    }

    

    //News

    public function news($slug)

    {

       $news=Blog::where(['status'=>'active','url'=>$slug])->first();

       return view('news',compact('news'));

    }

}

