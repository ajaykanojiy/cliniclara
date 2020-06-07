
@extends('admin.comman.master1')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


@section('content')

@section('title', 'Create Form')

<div class="card card-primary">

  
             
              <!-- form start -->
              <form role="form" method="post" action="{{url('doctor')}}"  enctype= multipart/form-data>
                  @csrf
                             
            <div class="card-body">
              <div class="row">

                <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"  name="name" value="" placeholder="Enter Name">
                    @error('name') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                  
                   <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" class="form-control" id="number" name="number" value="" placeholder="number">
                    @if ($errors->has('number')) <p style="color:red;">{{ $errors->first('number') }}</p> @endif
                  </div>
                </div>

                   <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="number" name="email" value="" placeholder="email">
                     @error('email') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                    
                  <div class="col-md-4"> 
                    <div class="form-group">
                    <label for="main_educaton">main_educaton</label>
                    <input type="text" class="form-control" id="main_educaton" name="main_educaton" value="" placeholder="main_educaton">
                    @error('main_educaton') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>

                  <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="medical_reg_no">medical_reg_no</label>
                    <input type="text" class="form-control" id="medical_reg_no" name="medical_reg_no" value="" placeholder="medical_reg_no">
                    @error('medical_reg_no') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                  
                  <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="year_of_experience">year_of_experience</label>
                    <input type="text" class="form-control" id="year_of_experience" name="year_of_experience" value="" placeholder="year_of_experience">
                    @error('year_of_experience') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                

                 <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="patients_per_hour">patients_per_hour</label>
                    <input type="text" class="form-control" id="patients_per_hour" name="patients_per_hour" value="" placeholder="patients_per_hour">
                    @error('patients_per_hour') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
                
                  <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="fees">fees</label>
                    <input type="text" class="form-control" id="fees" name="fees" value="" placeholder="fees">
                    @error('fees') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>


                  <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="exampleInputPassword1">speciality</label>                   
                    <select class="form-control" name="speciality" id="speciality">
                      <option value="1">Super Admin</option>
                      <option value="2">Admin</option>
                      <option value="3">Dcotor</option>
                      <option value="4">Employee</option>
                    </select>
                    @error('speciality') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>

                   <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="gender">gender</label>                  
                    <select class="form-control" name="gender" id="gender">
                      <option value="1">Male</option>
                      <option value="2">Female</option>                      
                    </select>
                  </div>
                </div>


                  <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="fees">image</label>
                    
                    <input type="file" class="form-control" id="image" name="image" value="" placeholder="image">
                    @error('image') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>

                  <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="status">Status</label>                  
                    <select class="form-control" name="status" id="status">
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>                      
                    </select>
                  </div>

                </div>
              </div>
            </div>
             
                <div class="card-footer" style="margin-bottom: -10px; margin-top: -24px;">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>  

      <!-- Schedule Form Second Form -->
              
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">schedule Create Form</h3>
              </div>
             <form role="form" name="schedule_form" id="schedule_form" method="post" action=""  enctype= multipart/form-data>
                  @csrf

              <div class="card-body">
                <label>Add Schedule</label>
                 <div class="row">
                   
                    <div class="col-md-4" style="margin-top: 0;">
                        <!-- checkbox -->
                        <!-- <div class="form-group clearfix"> -->
                       
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary" class="" value="" >
                            <label for="checkboxPrimary">
                            </label>
                          </div>

                            <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary1" class="days" value="1">
                            <label for="checkboxPrimary1">
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary2" class="days" value="2">
                            <label for="checkboxPrimary2">
                            </label>
                          </div>
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary3" class="days" value="3" >
                            <label for="checkboxPrimary3">
                            
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary4" class="days" value="4" >
                            <label for="checkboxPrimary4">
                            
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary5" value="5" >
                            <label for="checkboxPrimary5">
                            
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary6" class="days" value="6" >
                            <label for="checkboxPrimary6">
                          
                            </label>
                          </div>

                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="days[]" id="checkboxPrimary7" class="days" value="7" >
                            <label for="checkboxPrimary7">
                            
                            </label>
                          </div>
                          <span id="titleError" class="alert-message"></span>
                          <span id="from_time_error" class="alert-message"></span>
                        </div>
                      <!-- </div> -->

                    <div class="col-md-2"> 
                      <div class="form-group">
                        <input type="text" class="form-control timepicker" id="from" name="from" value="" placeholder="Start Time">
                        @error('image') <p style="color:green">{{$message}}</p>@enderror
                        <span id="from_time_error" class="alert-message"></span>
                      </div>
                     </div>

                  <div class="col-md-2"> 
                      <div class="form-group">                      
                        <input type="text" class="form-control timepicker " id="to" name="to" value="" placeholder="End time">
                        <span id="to_time_error" class="alert-message"></span>
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
                      <input type="hidden" name="schedule_id" id="schedule_id">
                  <button type="button" class="btn btn-primary" id="" onclick="createPost()">Submit</button>
                   <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                </div>

                </div>
           </div>
                       
             </form>
           </div>



            <div class="card-body">
              <table id="schdule_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>days</th>
                  <th>From</th>
                  <th>to</th>
                  <!-- <th>main_educaton</th> -->
                  <!-- <th>medical_reg_no</th> -->
                 
                  <th>Action</th>                 
                </tr>
                </thead>
                <tbody>
                  @if($schedule)
                  @foreach($schedule as $schedule)
                <tr id="row_{{$schedule->id}}">
                  <td>{{$schedule->days}}</td>
                  <td> {{$schedule->from_time}} </td>
                  <td>{{$schedule->to_time}}</td>
                
                 
                  <td>
                    <!-- <a href="{{url('doctor/'.$schedule->id.'/edit')}}" class="btn btn-primary edit_product ">Edit</a> -->
                    
                    <!-- <form method="post" action="{{url('doctor',$schedule->id)}}">
                       
                      @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete_product" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
 -->
                    <!-- </form> -->
                   <a href="javascript:void(0)" data-id="{{ $schedule->id }}" onclick="editPost(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $schedule->id }}" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a>
                  </td>
                  
                </tr>
                @endforeach
               @endif
                </tbody>
               
              </table>
            </div>



    @endsection

    @section('script')

    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>


    <script type="text/javascript">
     $(document).ready(function(){
     
//      $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
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

   $("#checkboxPrimary").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});

     $("input[type=checkbox]").click(function() {
    if (!$(this).prop("checked")) {
        $("#checkboxPrimary").prop("checked", false);
    }
});
 });

     function editPost(event) {
    var id  = $(event).data("id");
    let _url = `/schedule_edit/${id}`;
       
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
        if(response) {
         var str=response.days;
         var datsarray=str.split(",");
         alert(datsarray.length);

         var i;
for (i = 0; i < datsarray.length; i++) {
   $( "#checkboxPrimary"+datsarray[i] ).prop( "checked", true );  
    }
            $("#schedule_id").val(response.id);
            $("#doc_id").val(response.doc_id);
            $("#days").val(response.days);
            $("#from").val(response.from_time);
            $("#to").val(response.to_time);
          
          }
      }
    });
  }


  function createPost() {
      
    var update_id=  $('#schedule_id').val();
     
    let _url  = '{{ url('schedule') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#schedule_form').serialize(),
        success: function(response) {
          // alert('hello');
          alert( response.data.id);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.days+'</td><td>'+response.data.from_time+'</td><td>'+response.data.to_time+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editPost(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                 }
                  else {
                     
                     $('#schdule_list').prepend(product);                    
                 }
                $('#schedule_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#titleError').text(response.responseJSON.errors.days);
          $('#from_time_error').text(response.responseJSON.errors.from);
          $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deletePost(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/schedule_del/${id}`;
      
      $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
          "_token": "{{ csrf_token() }}",
        },
        success: function(response) {
          $("#row_"+id).remove();
        }
      });
  }


    </script>

    @endsection
    <!-- </div> -->