@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="pull-left">
                <h2>Assigned Tasks</h2>
            </div>
             <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/') }}">Back</a>
            </div> 
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Task ID</th>
                        <th>User ID</th>
                        <th>Guide Name</th>
                        <th>Reviewer Name</th>
                        <th>Assigned Date</th>
                        <th>Completion Date</th>
                        <th width="280px">Action</th> 
                    </tr>
                    @foreach ($assign_tasks as $key => $task)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $task->task_id }}</td>
                            <td>{{ $task->user_id }}</td>
                            <td>{{ $task->guide_id }}</td>
                            <td>{{ $task->reviewer_id}}</td>
                            <td>{{ $task->assigned_date}}</td>
                            <td>{{ $task->completion_date}}</td>
                            <td>
                                <!-- <a class="btn btn-info" href="{{ route('AssignTasks.show',$task->id) }}">Show</a> -->
                                <!-- <a class="btn btn-primary btn-xs" href="{{ route('AssignTasks.edit',$task->id) }}">Edit</a> -->
                                <!-- {!! Form::open(['method' => 'DELETE','route' => ['AssignTasks.destroy', $task->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!} -->
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!! $assign_tasks->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection