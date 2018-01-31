<?php

namespace App\Http\Controllers;
use App\UserTasks;
use App\AdminTasks;
use App\AssignTasks;
use DB;
use Auth;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\TaskMigrate;
use Illuminate\Http\Request;
use App\Http\Controllers\View;

class TaskMigrateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->id <= 3)
        {
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription','admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads')
            ->whereNull('assign_tasks.status')->orderBy('assign_tasks.task_id','desc')->get();    
        }
        else
        {
           
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->whereNull('assign_tasks.status')
            ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription','admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads')
            ->orderBy('assign_tasks.task_id','desc')->get();
           
        }
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

        DB::table('assign_tasks')->where('id', $requestData['assigntask_id'])
        ->update(['status' => $requestData['request_for']]);
     
        UserTasks::create($requestData);
        return redirect()->route('TaskMigrate.index')
                        ->with('success','AdminTasks created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\TaskMigrate  $taskMigrate
     * @return \Illuminate\Http\Response
     */
    public function show($cop_str)
    {
 
        if(Auth::user()->id <= 3)
        {
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.status',$cop_str)
            ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription','admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads')
            ->orderBy('assign_tasks.task_id','desc')->get();
           
        }
        else
        {      
            $assign_tasks = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->where('assign_tasks.status',$cop_str)
            ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription','admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads')
            ->orderBy('assign_tasks.task_id','desc')->get();
             
        }
        return view('TaskMigrate.index',compact('assign_tasks'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskMigrate  $taskMigrate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_tasks = DB::table('user_tasks')
        ->join('assign_tasks','user_tasks.assigntask_id', '=', 'assign_tasks.id')
        ->where( 'assign_tasks.id',$id)
        ->select('user_tasks.*')->get();
        $assign_tasks = AssignTasks::find($id);
        // echo($id);
        return view('TaskMigrate.edit',compact('user_tasks','assign_tasks',$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskMigrate  $taskMigrate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskMigrate $taskMigrate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskMigrate  $taskMigrate
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskMigrate $taskMigrate)
    {
        //
    }
}
