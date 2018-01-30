@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="pull-left">
                <h2 style="color:#2471A3">User Profile</h2>
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
                        <th>Name</th><br>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Date Of Birth</th>
                        <th>Qualification</th>
                        <th>Specialization</th>
                        <th>Marks</th>
                        <th>Passed Out</th>
                        <th>College Address</th>
                        <th>Home Address</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($users as $key => $details)
                        <tr>
                            <td>{{ ++$i }}</td> 
                            <td>{{ $details->name }}</td>
                            <td>{{ $details->email }}</td>
                            <td>{{ $details->number }}</td>
                            <td>{{ $details->dob}}</td>
                            <td>{{ $details->qualification}}</td>
                            <td>{{ $details->specialization}}</td>
                            <td>{{ $details->marks}}</td>
                            <td>{{ $details->passout}}</td>
                            <td>{{ $details->collegeaddress}}</td>
                            <td>{{ $details->homeaddress}}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('Profile.show',$details->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('Profile.edit',$details->id) }}">Edit</a>

                                
                                <!-- {!! Form::open(['method' => 'DELETE','route' => ['Profile.destroy', $details->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} 
                                {!! Form::close() !!}  -->
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection