
@extends('admin.comman.master1')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@section('content')
@section('title', 'Update Form')

<div class="card card-primary">

  
              <!-- <div class="card-header">
                <h3 class="card-title">Doctor Create Form</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('doctor',$row->id)}}"  enctype= multipart/form-data>
                  @csrf
                      @method('put')        
            <div class="card-body">
              <div class="row">

                <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"  name="name" value="{{$row->name}}" placeholder="Enter Name">
                    @error('name') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                  
                   <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" class="form-control" id="number" name="number" value="{{$row->number}}" placeholder="number">
                    @if ($errors->has('number')) <p style="color:red;">{{ $errors->first('number') }}</p> @endif
                  </div>
                </div>

                   <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="number" name="email" value="{{$row->email}}" placeholder="email">
                     @error('email') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                    
                  <div class="col-md-4"> 
                    <div class="form-group">
                    <label for="main_educaton">main_educaton</label>
                    <input type="text" class="form-control" id="main_educaton" name="main_educaton" value="{{$row->main_educaton}}" placeholder="main_educaton">
                    @error('main_educaton') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>

                  <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="medical_reg_no">medical_reg_no</label>
                    <input type="text" class="form-control" id="medical_reg_no" name="medical_reg_no" value="{{$row->medical_reg_no}}" placeholder="medical_reg_no">
                    @error('medical_reg_no') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                  
                  <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="year_of_experience">year_of_experience</label>
                    <input type="text" class="form-control" id="year_of_experience" name="year_of_experience" value="{{$row->year_of_experience}}" placeholder="year_of_experience">
                    @error('year_of_experience') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                

                 <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="patients_per_hour">patients_per_hour</label>
                    <input type="text" class="form-control" id="patients_per_hour" name="patients_per_hour" value="{{$row->patients_per_hour}}" placeholder="patients_per_hour">
                    @error('patients_per_hour') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                
                  <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="fees">fees</label>
                    <input type="text" class="form-control" id="fees" name="fees" value="{{$row->fees}}" placeholder="fees">
                    @error('fees') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>


                  <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="exampleInputPassword1">speciality</label>                   
                    <select class="form-control" name="speciality" id="speciality">
                      <option value="1"<?php if($row->speciality==1){echo 'selected';} ?>>Super Admin</option>
                      <option value="2"<?php if($row->speciality==2){echo 'selected';} ?>>Admin</option>
                      <option value="3"<?php if($row->speciality==3){echo 'selected';} ?>>Dcotor</option>
                      <option value="4"<?php if($row->speciality==4){echo 'selected';} ?>>Employee</option>
                    </select>
                    @error('speciality') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>

                   <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="gender">gender</label>                  
                    <select class="form-control" name="gender" id="gender">
                      <option value="1"<?php if($row->gender==1){echo 'selected';} ?>>Male</option>
                      <option value="2"<?php if($row->gender==2){echo 'selected';} ?>>Female</option>                      
                    </select>
                  </div>
                </div>


                  <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="fees">image</label>
                    <input type="text" class="form-control" id="image" name="image" value="" placeholder="image">
                    @error('image') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>

                  <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="status">Status</label>                  
                    <select class="form-control" name="status" id="status">
                      <option value="1"<?php if($row->status==1){echo 'selected';} ?>>Active</option>
                      <option value="2"<?php if($row->status==2){echo 'selected';} ?>>Inactive</option>                      
                    </select>
                  </div>

                </div>
              </div>
            </div>
             
                <div class="card-footer" style="margin-bottom: -10px; margin-top: -24px;">
                  <!-- <input type="hidden" name="doctor_id" id="doctor_id" value="{{$row->id}}"> -->
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

      <!-- Schedule Form Second Form -->
              
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">schedule Create Form</h3>
              </div>
             <form role="form" name="schedule" id="schedule" method="post" action="{{url('schedule')}}"  enctype= multipart/form-data>
                  @csrf

              <div class="card-body">
                <label>Add Schedule</label>
                 <div class="row">
                   
                    <div class="col-md-4" style="margin-top: 0;">
                        <!-- checkbox -->
                        <!-- <div class="form-group clearfix"> -->
                       
        <div class="icheck-primary d-inline">
              <input type="checkbox" name="days[]" id="checkboxPrimary1" value="1"  {{in_array("1",$days)?"checked":""}}>
              <label for="checkboxPrimary1">
              </label>
        </div>

         <div class="icheck-primary d-inline">
            <input type="checkbox" name="days[]" id="checkboxPrimary2" value="2" {{in_array("2",$days)?"checked":""}}>
            <label for="checkboxPrimary2">
            </label>
        </div>
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary3" value="3"  {{in_array("3",$days)?"checked":""}}>
                            <label for="checkboxPrimary3">
                            
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary4" value="4" {{in_array("4",$days)?"checked":""}}>
                            <label for="checkboxPrimary4">
                            
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary5" value="5" {{in_array("5",$days)?"checked":""}}>
                            <label for="checkboxPrimary5">
                            
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary6" value="6" {{in_array("6",$days)?"checked":""}} >
                            <label for="checkboxPrimary6">
                          
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary7" value="7" {{in_array("7",$days)?"checked":""}} >
                            <label for="checkboxPrimary7">
                            
                            </label>
                          </div>

                        </div>
                      <!-- </div> -->

                    <div class="col-md-2"> 
                      <div class="form-group">
                        <input type="text" class="form-control timepicker" id="from" name="from" value="" placeholder="Start Time">
                        @error('image') <p style="color:green">{{$message}}</p>@enderror
                      </div>
                     </div>

                  <div class="col-md-2"> 
                      <div class="form-group">                      
                        <input type="text" class="form-control timepicker " id="to" name="to" value="" placeholder="End time">
                        @error('image') <p style="color:green">{{$message}}</p>@enderror
                      </div>
                </div>
                    @php
                     if($insert_id){
                     $doc_id=$insert_id;
                   }
                   else{
                      $doc_id="";
                   }
                  
                     @endphp

                    
                    <div class="" style="margin-bottom: -px; margin-top: px;">
                      <input type="text" name="doc_id" id="doc_id" value="{{$doc_id}}">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <button type="submit" class="btn btn-primary">Cancel</button>
                </div>

                </div>
           </div>
                       
             </form>
           </div>



    @endsection

    @section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script type="text/javascript">

      $('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

   $("#checkboxPrimary1").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});


     $("input[type=checkbox]").click(function() {
    if (!$(this).prop("checked")) {
        $("#checkboxPrimary1").prop("checked", false);
    }
});


    </script>

    @endsection
    <!-- </div> -->