<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Auth;

use Illuminate\Http\Request;

use App\Model\Resolution;

use App\Model\Result;



class ReportController extends Controller

{

   public function index()

   {

   		$result=Result::leftJoin('resolutions', 'resolutions.id', '=', 'results.resolution_id')->leftJoin('users', 'users.id', '=', 'results.user_id')->where(['results.category_id'=>1,'resolutions.finalize'=>1,'results.backup'=>0])->orderBy('results.question_id', 'ASC')->get();

      return view('admin.report_fd',compact('result'));



   }



   public function reports_buyers()

   {

      $result=Result::leftJoin('resolutions', 'resolutions.id', '=', 'results.resolution_id')->leftJoin('users', 'users.id', '=', 'results.user_id')->where(['results.category_id'=>2,'resolutions.finalize'=>1,'results.backup'=>0])->orderBy('results.question_id', 'ASC')->get();



       return view('admin.reports_buyers',compact('result'));

   }



   public function reports(){

       $admintype=Auth::guard('admin')->user()->admin_type;

        if($admintype!=0){

            $resolutions=Resolution::select('resolutions.event_id','resolutions.id','resolutions.agenda','resolutions.startdate','resolutions.enddate','resolutions.start_time','resolutions.end_time','resolutions.resolutionfile','resolutions.status','resolutions.finalize','resolutions.backup')->where(['resolutions.backup'=>0,'resolution_category.category_id'=>$admintype])

            ->Join('resolution_category', 'resolutions.id', '=', 'resolution_category.resolution_id')

            ->get(); 

       }else{

            $resolutions=Resolution::where(['resolutions.backup'=>0])->get(); 

       }

       return view('admin.reports',compact('resolutions'));

   }



   public function download_report($id)

   {

            $result=Result::leftJoin('resolutions', 'resolutions.id', '=', 'results.resolution_id')->leftJoin('users', 'users.id', '=', 'results.user_id')->where(['results.resolution_id'=>$id,'resolutions.finalize'=>1])->orderBy('results.question_id', 'ASC')->get();

            //First Method          

            $export_data="Event Id,Resolution Id,Voting share,Name,Member Id,Sum of No. of Votes for Yes,Sum of No. of Votes for No,Sum of No. of Votes for Abstain\n";

            $option_1=0;

            $option_2=0;

            $option_3=0;



            foreach($result as $row){



                if($row->option_1==1) $option_1++; 

                elseif ($row->option_2==1) $option_2++;

                elseif ($row->option_3==1) $option_3++;



                $export_data.=$row->resolution->event_id.','.$row->question_id.','.$row->user->voting_share.','.$row->user->name.','.$row->user->fd_no.','.$row->option_1.','.$row->option_2.','.$row->option_3."\n";

            }



           $export_data.='Total'.','. ','.' '.','. ',' .','.$option_1.','.$option_2.','.$option_3."\n";





            return response($export_data)

                ->header('Content-Type','application/csv')               

                ->header('Content-Disposition', 'attachment; filename="reports.csv"')

                ->header('Pragma','no-cache')

                ->header('Expires','0');                     

               

   }



}

