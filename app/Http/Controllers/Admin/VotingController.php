<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Model\Resolution;

use App\Model\Resolution_question;
use App\Model\Result;




class VotingController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {

        $votings=Resolution_question::select('resolution_questions.id','resolution_questions.resolution_text','resolution_questions.resolution_description','resolution_questions.status','resolutions.event_id')->where(['resolution_questions.backup'=>0])->leftJoin('resolutions', 'resolutions.id', '=', 'resolution_questions.resolution_id')->get();

        return view('admin.votelist',compact('votings'));

    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()

    {

        $resolution=Resolution::get()->where('status','active');

        return view('admin/vote_create',compact('resolution'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)

    {

          $url = str_slug($request->resolution_text,'-');

          $question=Resolution_question::Create([

            'resolution_id'=>$request->resolution_id,

            'resolution_text'=>$request->resolution_text,

            'resolution_description'=>$request->resolution_description,

            'slug'=>$url,

            'option_1'=>$request->option_1,

            'option_2'=>$request->option_2,

            'option_3'=>$request->option_3,

            'status'=>$request->status

            ]);



         

          return redirect('admin/voting')->with('success','successfully add');

    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)

    {

        $resolution=Resolution::get()->where('status','active');
        $resolution_question=Resolution_question::find($id);
        return view('admin/vote_create',compact('resolution','resolution_question'));

    }



     /**
     * Update the specified resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)

    {



       $resolution_question=Resolution_question::find($id);



        $url = str_slug($request->resolution_text,'-');

        $resolution_question->resolution_id=$request->resolution_id;

        $resolution_question->resolution_text=$request->resolution_text;

        $resolution_question->resolution_description=$request->resolution_description;

        $resolution_question->slug=$url;

        $resolution_question->option_1=$request->option_1;

        $resolution_question->option_2=$request->option_2;

        $resolution_question->option_3=$request->option_3;

        $resolution_question->status=$request->status;

        $resolution_question->save();





        return redirect('/admin/voting')->with('success','successfully update');



    }



     public function destroy($id)

    {

            Resolution_question::destroy($id);
            Result::where('question_id',$id)->delete();

           return;

    }



   

}

