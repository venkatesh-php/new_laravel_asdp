<?php

namespace App\Http\Controllers;
use App\AdminTasks;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class AdminTasksController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admin_tasks = AdminTasks::orderBy('id','DESC')->paginate(15);
        return view('AdminTasks.index',compact('admin_tasks','profilepic'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminTasks.create');
    }


    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        // |image|mimes:jpeg,png,jpg,gif,svg|max:20048
        
        
        $this->validate($request, [
            'worknature' => 'required',
            'onskills' => 'required',
            'worktitle' => 'required',
            'workdescription' => 'required',
            'whatinitforme' => 'required',
            'usercredits' => 'required',
            'guidecredits' => 'required',
            'reviewercredits' => 'required',
            'uploads' => '',
        ]);
          
        $product = new AdminTasks($request->file());
     
        if($file = $request->hasFile('uploads')) {
           
           $file = $request->file('uploads');           
           $fileName = $file->getClientOriginalName();
           $destinationPath = public_path().'/uploads/';
           $file->move($destinationPath,$fileName);

           $file = public_path().'/uploads/'.$fileName;

            $requestData = $request->all();
            $requestData['uploads'] = $file;
            // $product->uploads = $file;        
        }else{
            $requestData = $request->all();
        }
     
        AdminTasks::create($requestData);
        return redirect()->route('AdminTasks.index')
                        ->with('success','AdminTasks created successfully');
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin_tasks = AdminTasks::find($id);
        return view('AdminTasks.show',compact('admin_tasks'));
        // echo($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin_tasks = AdminTasks::find($id);
        return view('AdminTasks.edit',compact('admin_tasks'));
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
        $this->validate($request, [
            'worknature' => '',
            'onskills' => '',
            'worktitle' => '',
            'workdescription' => '',
            'whatinitforme' => '',
            'usercredits' => '',
            'guidecredits' => '',
            'reviewercredits' => '',
            'uploads' => '',
           
        ]);
        $product = new AdminTasks($request->file());
     
        if($file = $request->hasFile('uploads') && $request->file('uploads')->isValid()) {
           
           $file = $request->file('uploads');           
           $fileName = $file->getClientOriginalName();
           $destinationPath = public_path().'/uploads/';
           $file->move($destinationPath,$fileName);

           $file = public_path().'/uploads/'.$fileName;

            $requestData = $request->all();
            $requestData['uploads'] = $file;
            // $product->uploads = $file;        
        }else{
            $requestData = $request->all();
        }


        AdminTasks::find($id)->update($request->all());
        return redirect()->route('AdminTasks.index')
                        ->with('success','AdminTasks updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminTasks::find($id)->delete();
        return redirect()->route('AdminTasks.index')
                        ->with('success','AdminTasks deleted successfully');
    }


}
