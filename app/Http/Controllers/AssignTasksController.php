<?php

namespace App\Http\Controllers;

use App\AssignTasks;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\AdminTasks;

class AssignTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $assign_tasks = AssignTasks::orderBy('id','DESC')->paginate(15);
        return view('AssignTasks.index',compact('assign_tasks'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        // // $works = DB::table('admin_tasks')->select('id')->get();
        // $works = AdminTasks::find($id);
        // return view('AssignTasks.create',compact('users','works'));
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
            'task_id' => 'required',
            'user_id' => 'required',
            'guide_id' => 'required',
            'reviewer_id' => 'required',
            'assigned_date' => 'required',
            'completion_date' => 'required',
        ]);

        AssignTasks::create($request->all());
        return redirect()->route('AssignTasks.index')
            ->with('success','Task Assigned Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssignTasks  $assignTasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        // $works = DB::table('admin_tasks')->select('id')->get();
        $works = AdminTasks::find($id);
        return view('AssignTasks.create',compact('users','works',$id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssignTasks  $assignTasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assign_tasks = AssignTasks::find($id);
        $users = User::all();
        $works = AdminTasks::all();
        return view('AssignTasks.edit',compact('assign_tasks','users','works'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssignTasks  $assignTasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::all();
        $works = AdminTasks::all();
        $this->validate($request, [
            'task_id' => '',
            'user_id' => '',
            'guide_id' => '',
            'reviewer_id' => '',
            'assigned_date' => '',
            'completion_date' => '',
        ]);

        
        AssignTasks::find($id)->update($request->all());
        return redirect()->route('AssignTasks.index',compact('users','works'))
                        ->with('success','AssignTasks updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssignTasks::find($id)->delete();
        return redirect()->route('AssignTasks.index')
                        ->with('success','AssignTasks deleted successfully');
    }
}
