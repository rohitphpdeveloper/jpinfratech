<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Hash;

use App\User;

use App\Model\Category;

use App\Model\Result;

use App\Model\Enquiry;

use Excel;

use Validator;

class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $users=User::where(['backup'=>0])->with('usertype')->get();

        return view('admin.user',compact('users'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $category=Category::get();

        return view('admin.user_create',compact('category'));

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

         $this->validate($request, ['fd_no' =>'required|string|max:255|unique:users','voting_share' =>'required','email' =>'required|string|email|max:255','name' => 'required|string|min:3|max:255','user_type' =>'required' ]);

      

         $user= User::create([

            'fd_no' => $request->fd_no,

            'voting_share' => $request->voting_share,

            'name' => $request->name,

            'email' => $request->email,

            'mobile' =>$request->mobile,

            'password' => bcrypt(rand(10000,99999)),

            'user_type' =>$request->user_type,

            'prn_amt' =>$request->prn_amt,

            'int_amt' =>$request->int_amt,

            'mat_date' =>$request->mat_date,

            'roi' =>$request->roi,

            'adr1' =>$request->adr1,

            'adr2' =>$request->adr2,

            'adr3' =>$request->adr3,

            'adr4' =>$request->adr4,

            'email2' =>$request->email2,

            'pin' =>$request->pin,

            'pan' =>$request->pan,

            



            'sale_order' =>$request->sale_order,

            'customer' =>$request->customer,

            'collection' =>$request->collection,

            'interest' =>$request->interest,

            'total' =>$request->total,



        ]);

           return redirect('admin/users/');

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

        $users=User::with('usertype')->where('id',$id)->first();

        return view('admin.user_edit',compact('users','category')); 

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

        $this->validate($request, ['fd_no' =>'required|string|max:255','voting_share' =>'required','email' =>'required|string|email|max:255','name' => 'required|string|min:3|max:255','user_type' =>'required' ]);

      

            User::where('id',$id)->update(['fd_no' => $request->fd_no,

            'name' => $request->name,

            'voting_share' => $request->voting_share,

            'email' => $request->email,

            'mobile' =>$request->mobile,

            'user_type' =>$request->user_type,

            'prn_amt' =>$request->prn_amt,

            'int_amt' =>$request->int_amt,

            'mat_date' =>$request->mat_date,

            'roi' =>$request->roi,

            'adr1' =>$request->adr1,

            'adr2' =>$request->adr2,

            'adr3' =>$request->adr3,

            'adr4' =>$request->adr4,

            'email2' =>$request->email2,

            'pin' =>$request->pin,

            'pan' =>$request->pan,



            'sale_order' =>$request->sale_order,

            'customer' =>$request->customer,

            'collection' =>$request->collection,

            

            'interest' =>$request->interest,

            'total' =>$request->total]);

            return redirect('admin/users/');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::where('id', $id)->delete();

        Result::where('user_id',$id)->delete();

        Enquiry::where('user_id',$id)->delete();

       echo json_encode(array('status' =>200 ,'message'=>'successfully deleted'));

    }



    

    public function user_import(Request $reuest){



        return view('admin.user_import');

    }



    public function import_excel(Request $request)

    {

        $validator = Validator::make([

            'file'      => $request->excel_import,

            'extension' => strtolower($request->excel_import->getClientOriginalExtension()),

          ],

          [

            'file'          => 'required',

            'extension'      => 'required|in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp',

          ]);



        if ($validator->fails())

        {

          return redirect('admin/user_import/')->withErrors($validator)->withInput();

        } 



        $file = $request->file('excel_import')->getRealPath();

        $data = Excel::load($file, function($reader) {

        })->get();

        $errors=array();





    if(!empty($data) && $data->count()){

     

     $errors=array();

      foreach ($data as $key => $value) {

     $exitsData=User::where('fd_no',$value->fd_no)->first();

     if(empty($exitsData))

     {

      try{

            User::create([

                'fd_no' => $value->fd_no,

                'voting_share' => $value->voting_share,

                'name' => $value->name,

                'email' => $value->email,

                'mobile' =>$value->mobile,

                'password' => bcrypt(rand(10000,99999)),

                'user_type' =>$value->user_type,

                'prn_amt' =>$value->prn_amt,

                'int_amt' =>$value->int_amt,

                'mat_date' =>$value->mat_date,

                'roi' =>$value->roi,

                'adr1' =>$value->adr1,

                'adr2' =>$value->adr2,

                'adr3' =>$value->adr3,

                'adr4' =>$value->adr4,

                'email2' =>$value->email2,

                'pin' =>$value->pin,

                'pan' =>$value->pan,

                'sale_order' =>$value->sale_order,

                'customer' =>$value->customer,

                'collection' =>$value->collection,
                'interest' =>$value->interest,
                'total' =>$value->total,

            ]);







         $errors[] = array('user_id'=>$value->fd_no,'message'=>'successfully add user');

      }

      catch(\Exception $e)

      {

        $errors[] = array('user_id'=>$value->fd_no,'message'=>'Inserting Error Please check excel sheet');

      }



     }

     else{

        try{

           User::where('fd_no',$value->fd_no)->update(['voting_share' => $value->voting_share,'name' => $value->name,'email' => $value->email,'mobile' =>$value->mobile,'password' => bcrypt(rand(10000,99999)),'user_type' =>$value->user_type,'prn_amt' =>$value->prn_amt,'int_amt' =>$value->int_amt,'mat_date' =>$value->mat_date,'roi' =>$value->roi,'adr1' =>$value->adr1,'adr2' =>$value->adr2,'adr3' =>$value->adr3,'adr4' =>$value->adr4,'email2' =>$value->email2,'pin' =>$value->pin,'pan' =>$value->pan,'sale_order' =>$value->sale_order,'customer' =>$value->customer,'collection' =>$value->collection,'interest' =>$value->interest,'total' =>$value->total]);

             $errors[] = array('user_id'=>$value->fd_no,'message'=>'successfully update user');

              }

              catch(\Exception $e)

              {

                $errors[] = array('user_id'=>$value->fd_no,'message'=>'Update Error Please check excel sheet');

              }


        } 

     }



   }





return view('admin.user_csv_success',compact('errors'));

    }





}

