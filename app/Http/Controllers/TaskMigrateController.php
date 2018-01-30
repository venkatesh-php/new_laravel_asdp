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
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\TaskMigrate  $taskMigrate
     * @return \Illuminate\Http\Response
     */
    public function show($cop_str)
    {
       
        // $cop_str=$id;
        // return $cop_str;

        
       $assign_tasks = DB::table('assign_tasks')
                           ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
                           ->join('user_tasks','user_tasks.assigntask_id','assign_tasks.id')
                           ->where('assign_tasks.user_id',Auth::user()->id)
                           ->where('user_tasks.request_for',$cop_str)
                           ->select('assign_tasks.*','admin_tasks.worktitle','admin_tasks.workdescription',
                           'admin_tasks.whatinitforme','admin_tasks.usercredits','admin_tasks.uploads',
                           'user_tasks.request_for')->latest('user_tasks.request_for')->orderBy('assign_tasks.created_at','desc')->get();

                        //    return JSON_decode(JSON_encode($assign_tasks)); 
                           // ->having('user_tasks.request_for', '>', 1)->latest('user_tasks.request_for')
        // $assign_tasks = DB::table('assign_tasks')
        //                 ->groupBy($assign_tasks1)->get();     
        if($cop_str =='redo' || $cop_str =='review'){
            $approved_ids = DB::table('assign_tasks')
            ->join('admin_tasks','assign_tasks.task_id', '=', 'admin_tasks.id')
            ->join('user_tasks','user_tasks.assigntask_id','assign_tasks.id')
            ->where('assign_tasks.user_id',Auth::user()->id)
            ->where('user_tasks.request_for','drop')->orWhere('user_tasks.request_for','approved')
            ->select('assign_tasks.id')->latest('user_tasks.request_for')->orderBy('assign_tasks.created_at','desc')->get();

           
            $aids = array_map(function($a){ return $a->id;}, (array)JSON_decode(JSON_encode($approved_ids)));
            //     $reqarray=[];
        // //    $idcol= array_column((array)$assign_tasks[0],'id');
            $taskarray = JSON_decode(JSON_encode($assign_tasks));
            $b = array_map(function($a){ return $a->id;}, (array)$taskarray);
            $ub=array_unique($b);
            
            // $ub=array_flip($b);
        //     // $akeys = array_keys($b); 
        //     $bflip=array_flip($b);
        $missing=[];
        $reqarray=[];
                    foreach ($ub as $j) { 
                        $i=0;
                        foreach ($aids as $k) { 
                            
                            if($j==$k){
                                break;
                            }
                            $i += 1;
                        }
                        if($i==count($aids)){
                            $missing[]=$j;
                            // var_dump ($missing);
                        }
                     }
            
                        foreach ($missing as $k) { 
                            //  var_dump ($k);
                            foreach ((array)$taskarray as $arrayitem){
                                if(((array)$arrayitem->id)[0]==$k){
                                array_push($reqarray, $arrayitem);
                                }
                                //  var_dump(((array)$arrayitem->id)[0]);
                            }
                        }

        $assign_tasks= $reqarray;
        // var_dump($reqarray);
        //  var_dump($aids);
        }
                
          return view('TaskMigrate.show',compact('assign_tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskMigrate  $taskMigrate
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskMigrate $taskMigrate)
    {
        //
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
