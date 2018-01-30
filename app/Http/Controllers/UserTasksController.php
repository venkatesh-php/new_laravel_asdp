<?php

namespace App\Http\Controllers;

use App\UserTasks;
use App\AdminTasks;
use App\AssignTasks;
use App\Index1;
use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;



use Illuminate\Http\UploadedFile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class UserTasksController extends Controller
{
    public function index(Request $request)
    {
        
        // $assign_tasks = DB::table('assign_tasks')
        // ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
        // ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription','admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads')
        // ->where('assign_tasks.user_id',Auth::user()->id)->orderBy('assign_tasks.id','desc')->get();
        $assign_tasks = DB::table('assign_tasks')
                            ->where('assign_tasks.user_id',Auth::user()->id)
                           ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')                          
                           
                           ->leftJoin('user_tasks','user_tasks.assigntask_id','assign_tasks.id')
                           ->whereNull('user_tasks.id')
                           ->select('assign_tasks.*'
                           ,'admin_tasks.worktitle','admin_tasks.workdescription',
                           'admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads',
                           'user_tasks.request_for')->latest('user_tasks.request_for')
                           ->orderBy('assign_tasks.id','desc')
                           ->get();

            
        return view('TaskMigrate.index',compact('assign_tasks'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'assigntask_id' => 'required',
            'request_for' => 'required',
            'message' => '',
            'uploads' => '',
        ]);

        $product = new UserTasks($request->file());
     
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
     
        UserTasks::create($requestData);
        return redirect()->route('UserTasks.index')
                        ->with('success','AdminTasks created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_tasks = DB::table('user_tasks')
        ->join('assign_tasks','user_tasks.assigntask_id', '=', 'assign_tasks.id')   
        ->select('user_tasks.*')
        ->where( 'assign_tasks.id',$id)->get();
        $assign_tasks = AssignTasks::find($id);
        // $i=0;
        // if($user_tasks=='')
        //     return $i;
        
        return view('UserTasks.show',compact('user_tasks','assign_tasks',$id));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
         // 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTasks $userTasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTasks $userTasks)
    {
        //
    }
}
