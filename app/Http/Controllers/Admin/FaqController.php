<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Faq;
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq=Faq::all();

        return view('admin/faq',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/faq_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['question' => 'required','description' => 'required' ]);
    
          Faq::Create([
            'question'=>$request->question,
            'description'=>$request->description,
            'status'=>$request->status
            ]);
          return redirect('admin/faq')->with('success','successfully add');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq=Faq::find($id);
        return view('admin/faq_create',compact('faq','id'));

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

                $faq=Faq::find($id);
                $faq->question=$request->question;
                $faq->description=$request->description;

                $faq->status=$request->status;
                $faq->save();

                return redirect('/admin/faq');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
    {
        Faq::destroy($id);
        echo json_encode(array('status' =>200 ,'message'=>'successfully deleted'));
    }
}
