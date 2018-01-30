@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New Task Assignment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-xs" href="{{ route('AssignTasks.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($assign_tasks, ['method' => 'PATCH','route' => ['AssignTasks.update', $assign_tasks->id]]) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Task Name:</strong>
                
            <select name="task_id" class="form-control">
            @foreach ($works as $work)
            <option value="{{$work->id}}">{{$work->id}} . {{$work->worknature}} , {{$work->onskills}} , {{$work->worktitle}} , {{$work->worktitle}} , {{$work->whatinitforme}}</option>                
            @endforeach
            </select>               
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User Name</strong>
                <select name="user_id" class="form-control">
                     @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->id}} . {{$user->name}} , {{$user->email}}</option>                
                     @endforeach
                </select>               
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Guide Name</strong>
                <select name="guide_id" class="form-control">
                     @foreach ($users as $user)
                        <option value="{{$user->name}}">{{$user->id}} . {{$user->name}} , {{$user->email}}</option>                
                     @endforeach
                </select>                
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reviewer Name</strong>
                <select name="reviewer_id" class="form-control">
                     @foreach ($users as $user)
                        <option value="{{$user->name}}">{{$user->id}} . {{$user->name}} , {{$user->email}}</option>                
                     @endforeach
                </select>
            </div>
        </div>
     

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" class="form-control">
                <strong>Assigned Date:</strong>
                {!! Form::text('assigned_date', null, array('placeholder' => 'task assigned date','class' => 'form-control')) !!}
             
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Completion Date:</strong>
                {!! Form::text('completion_date', null, array('placeholder' => 'Completion Date','class' => 'form-control')) !!}
               
            </div>
        </div>
        


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}




@endsection