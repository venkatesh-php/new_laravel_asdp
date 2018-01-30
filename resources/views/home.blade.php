<!-- @inject('request', 'Illuminate\Http\Request') -->
@extends('layouts.app')
@section('content')
<!--<h1>{{Auth::user()->name }}</h1>
<h1>{{Auth::user()->id }}</h1>
<h2>{{Auth::user()->email }}</h2>  -->


<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div style="color:#2471A3" class="panel-heading">Welcome to Work Environment</div>

                <div class="panel-body">
                   
                @if(Auth::check())
                @if(Auth::user()->id <= 3) 
                  {{csrf_field()}} 
                   
                    <!--quick info section -->
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('AdminTasks.index') }}">
                                    <div class="alert alert-success">                                     
                                        <i class="fa fa-pencil-square-o fa-3x"></i>
                                        <h3>Admin Tasks</h3>
                                    </div></a> 
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Tasks:
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('AssignTasks.index') }}">
                                    <div class="alert alert-info">
                                        <i class="fa fa-cogs fa-3x"></i>
                                       
                                        <h3>Assign Tasks</h3>
                                    </div></a>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Users:
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('Profile.index') }}">
                                    <div class="alert alert-success">
                                        <i class="fa fa fa-floppy-o fa-3x"></i>
                                        <h3>Profile</h3>
                                    </div></a>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">New Data Uploaded
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('Conversations.index') }}">
                                    <div class="alert alert-info">
                                        <i class="fa fa-users fa-3x"></i>
                                        <h3>Conversations</h3>
                                    </div></a>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">New Data Uploaded
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--end quick info section -->
                    

                    <!-- Users Tasks info sectiopn -->
                    @else


                 
                    <div class="row">
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                <a style="text-decoration:none;" href="{{ route('UserTasks.index') }}">
                                    <div class="alert alert-info">                                     
                                        <i class="fa fa-pencil-square-o fa-3x"></i>
                                        <h3>User Tasks </h3>
                                    </div></a>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Tasks:
                                        </span>
                                    </div>
                                </div>
                                <!-- <h1>{{ route('UserTasks.index') }}</h1>
                                <h1>{{ route('TaskMigrate.index') }}</h1>                           -->
                              </div>
                            <!-- <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-success">
                                        <i class="fa fa-cogs fa-3x"></i>
                                       
                                        <h3><a style="text-decoration:none;" href="{{ route('AssignTasks.index') }}">Assign Tasks</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">Total Users:
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-info">
                                        <i class="fa fa fa-floppy-o fa-3x"></i>
                                        <h3><a style="text-decoration:none;" href="{{ route('Profile.index') }}">Profile</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">New Data Uploaded
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="panel panel-primary text-center no-boder">
                                    <div class="alert alert-success">
                                        <i class="fa fa-users fa-3x"></i>
                                        <h3><a style="text-decoration:none;" href=/usertasks>User Tasks</a></h3>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="panel-eyecandy-title">New Data Uploaded
                                        </span>
                                    </div>
                                </div>
                            </div>-->
                        </div> 
                        @endif

             

                @endif 




                     <!-- end of Users Tasks info sectiopn -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
