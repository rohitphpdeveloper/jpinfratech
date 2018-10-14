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

use App\Model\Result;



class ResolutionController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $admintype=Auth::guard('admin')->user()->admin_type;

        if($admintype!=0){

            $resolutions=Resolution::select('resolutions.event_id','resolutions.id','resolutions.agenda','resolutions.startdate','resolutions.enddate','resolutions.start_time','resolutions.end_time','resolutions.resolutionfile','resolutions.status','resolutions.finalize','resolutions.backup')->where(['resolutions.backup'=>0,'resolution_category.category_id'=>$admintype])

            ->Join('resolution_category', 'resolutions.id', '=', 'resolution_category.resolution_id')

            ->get(); 

       }else{

            $resolutions=Resolution::where(['resolutions.backup'=>0])->get(); 



       }

        

        return view('admin.resolutionlist',compact('resolutions'));

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {   

        $category=Category::get()->where('status', 'active');

        return view('admin/resolution_create',compact('category'));

    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request,['agenda'=>'required','startdate'=>'required','enddate'=>'required','start_time'=>'required','end_time'=>'required','status'=>'required']);

        $t=time();



        if(!empty($request->file('resolutionfile'))){

            $fileName =  $t. '.' .$request->file('resolutionfile')->getClientOriginalExtension();

            $request->file('resolutionfile')->move(base_path() . '/public/images/resolution/', $fileName);

        }else{

            $fileName = '';

        }

        $eid = rand(10,100);

        $resolution=Resolution::create([

            'event_id' =>$eid,

            'agenda' => $request->agenda,

            'startdate'=> $request->startdate,

            'enddate' => $request->enddate,

            'start_time' => $request->start_time,

            'end_time' => $request->end_time,

            'resolutionfile' => $fileName,

            'status'=>$request->status,

        ]);



        $lastid=$resolution->id;

        $number = sprintf('%02d',$lastid);

        $resolution->event_id=date('my').$number;

        $resolution->save();



       

         foreach ($request->category_id as $row)

            {

                 Resolution_category::Create(['resolution_id'=>$resolution->id,'category_id'=>$row]);

            }





        return redirect('/admin/resolution')->with('success','successfully add');

    }





    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $resolution=Resolution::find($id);

        $category=Category::get()->where('status', 'active');

        $resolution_category=Resolution_category::get()->where('resolution_id', $id);

        return view('admin/resolution_create',compact('resolution','category','category_user'));

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



       $this->validate($request,['agenda'=>'required','startdate'=>'required','enddate'=>'required','start_time'=>'required','end_time'=>'required','status'=>'required']);



       $resolution=Resolution::find($id);

      



        $resolution->agenda=$request->agenda;

        $resolution->startdate=$request->startdate;

        $resolution->enddate=$request->enddate;

        $resolution->start_time=$request->start_time;

        $resolution->end_time=$request->end_time;

        $resolution->status=$request->status;

        $resolution->save();





        if($request->file('resolutionfile'))

        {

                $fileName = time(). '.' .$request->file('resolutionfile')->getClientOriginalExtension();

                $request->file('resolutionfile')->move(base_path() . '/public/images/resolution/', $fileName);



                $resolution->resolutionfile=$fileName;

                $resolution->save();

        }



         Resolution_category::where('resolution_id',$id)->delete();



        foreach ($request->category_id as $row)

        {

             Resolution_category::Create(['resolution_id'=>$id,'category_id'=>$row]);

        }

       



        return redirect('/admin/resolution')->with('success','successfully update');



    }



    public function destroy($id)

    {





            $resolution=Resolution::find($id);



            Resolution::destroy($id);



            Resolution_category::where('resolution_id',$id)->delete();

            Resolution_question::where('resolution_id',$id)->delete();

            Result::where('resolution_id',$id)->delete();



            $file='public/images/resolution/'.$resolution->resolutionfile;

            if(file_exists($file))

            {

                @unlink($file);

            }



            return;



    }



    public function finalize(Request $request){

        Resolution::where('id',$request->id)->update( array('finalize'=>'1') );

    }

    public function resolution_log($id)

   {

        $resolution_logs=Resolution_log::with(['resolution'])->with(['user'])->where(['resolution_id'=>$id,'backup'=>0])->get();



         $log=Resolution_log::with(['resolution'])->with(['user'])->where(['resolution_id'=>$id,'backup'=>0])->get();

        //First Method          

        $export_data="Event Id,User,User Name,Client ip,Mac address,Date,Browser property\n";



        foreach($log as $row){

            

            $export_data.=$row->resolution->event_id.','.$row->user->fd_no.','.$row->user->name.','.$row->client_ip.','.$row->mac_address.','.$row->created_at.','.$row->browser_property."\n";

        }



        

        return response($export_data)

            ->header('Content-Type','application/csv')               

            ->header('Content-Disposition', 'attachment; filename="resolution_log.csv"')

            ->header('Pragma','no-cache')

            ->header('Expires','0');                     

               

   }



}

