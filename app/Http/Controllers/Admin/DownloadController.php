<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Classes\MyCrypt;

 
class DownloadController extends Controller {
     
    /*Export Data*/
    public function export(Request $request){  
        $secretKey = 'clamour';
        $countries=DB::table('countries')->select('id','name')->get();
        $tot_record_found=0;
        if(count($countries)>0){
            $tot_record_found=1;
            //First Method          
            $export_data="Country Id,Country Name\n";
            foreach($countries as $value){
                
                $export_data.=$value->id.','.$value->name."\n";

            }

            return response($export_data)
                ->header('Content-Type','application/csv')               
                ->header('Content-Disposition', 'attachment; filename="download.csv"')
                ->header('Pragma','no-cache')
                ->header('Expires','0');                     
        }
        return view('download',['record_found' =>$tot_record_found]);    
    }
     
}   
?>