@extends('layouts.app')
@section('content')

<div class="container-fluid">  
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="pull-left">
                <h2 style="color:#2471A3">Hello, Welcome to User Tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/') }}">Back</a>
            </div>
        </div>
    
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="pull-left">
                <h1>
                <!-- <a class="btn btn btn-lg" value='' href="{{ route('Conversations.index') }}">All Tasks</a> -->
                <a class="btn btn-primary btn-lg" href="{{ route('ConversationsMigrate.index') }}">Work to get Started</a>
                <a class="btn btn-info btn-lg" value='review' href="{{ route('ConversationsMigrate.show','review') }}">Work For Reviewed</a>
                <a class="btn btn-warning btn-lg" value='redo' href="{{ route('ConversationsMigrate.show','redo') }}">Work to be Refined</a>
                <a class="btn btn-success btn-lg" value='approved' href="{{ route('ConversationsMigrate.show','approved') }}">Work Completed</a>
                <a class="btn btn-danger btn-lg" value='drop' href="{{ route('ConversationsMigrate.show','drop') }}">Work Dropped</a>
                </h1>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr style="color:#2471A3">
                        <th>User ID</th>
                        <th>Assign Task Id</th> 
                        <th>Work Title</th>
                        <th>Work Description</th>
                        <th>What In IT For Me</th>
                        <th>User Credits</th>
                        <th>Set By</th>
                        <th>Review By</th>
                        <th>Assigned Date</th>
                        <th>Target Date</th>
                        <th>File Link</th>                    
                        <th width="280px">Action</th>
                        
                         
                    </tr>
                    @foreach ($assign_tasks as $task)
                    
                    <tr style="color:454545">
                        <td>{{ $task->user_id}}</td>
                        <td>{{ $task->id }}</td> 
                        <td>{{ $task->worktitle }}</td>
                        <td>{{ $task->workdescription }}</td>
                        <td>{{ $task->whatinitforme }}</td>
                        <td>{{ $task->usercredits}}</td>
                        <td>{{ $task->guide_id }}</td>
                        <td>{{ $task->reviewer_id}}</td>
                        <td>{{ $task->assigned_date}}</td>
                        <td>{{ $task->completion_date}}</td>
                        @if ($task->uploads)
                        <td><a class="btn btn-default btn-xs" href="{{ $task->uploads }}" download="{{ $task->uploads }}">Download</a></td>
                        @else
                        <td>Nill</td>
                        @endif
                        <td>
                            <!-- <a class="btn btn-info" href="{{ route('AdminTasks.show',$task->id) }}">Show</a> -->
                            <!-- <a class="btn btn-primary" href="{{ route('UserTasks.create',9) }}">View Work</a> -->
                             <a class="btn btn-info btn-xs" href="{{ route('Conversations.show',$task->id) }}">View Work</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>                       
@endsection