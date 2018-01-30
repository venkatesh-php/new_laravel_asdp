@extends('layouts.app')
@section('content')
<div class="pull-right">
      <a class="btn btn-success" href="{{ url('/') }}">Back</a>
                
</div>
<div class="container" style="padding-top: 60px;">
    <h1 style="color:#2471A3" class="page-header">User Profile</h1>
        <div class="row">
          <!-- left column -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
              <img src="http://www.skills.ameyem.com/images/logo.png" class="avatar img-circle img-thumbnail" alt="avatar">
              <h6>Upload a different photo...</h6>
              <input type="file" class="text-center center-block well well-sm">
            </div>
          </div>
          <!-- edit form column -->







          <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            
            <h3 style="color:#2471A3">Personal info</h3>
            <form class="form-horizontal" role="form" method="GET">

              <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                <p class="form-control-static">{{ $users->name }}</p>
                 
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                <p class="form-control-static">{{ $users->email }}</p>
                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Mobile Number:</label>
                <div class="col-lg-8">
                <p class="form-control-static">{{ $users->number }}</p>
               
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Date Of Birth:</label>
                <div class="col-lg-8">
                <p class="form-control-static">{{ $users->dob }}</p>
                  

                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Qualification:</label>
                <div class="col-md-8">
                <p class="form-control-static">{{$users->qualification}}</p>
                 
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Specialization:</label>
                <div class="col-md-8">
                <p class="form-control-static">{{$users->specialization}}</p>
                 
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Marks:</label>
                <div class="col-md-8">
                <p class="form-control-static">{{$users->marks}}</p>
                 
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Passed Out:</label>
                <div class="col-lg-8">
                <p class="form-control-static">{{$users->passout}}</p>
                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">College Address:</label>
                <div class="col-lg-8">
                <p class="form-control-static">{{$users->collegeaddress}}</p>
                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-3 control-label">Home Address:</label>
                <div class="col-lg-8">
                <p class="form-control-static">{{$users->homeaddress}}</p>
                 
                </div>
              </div>

               <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('viewprofile.edit',$users->id) }}"> Edit profile</a>
              </div>
              
            </form>
          </div>
        </div>
      </div>



@endsection