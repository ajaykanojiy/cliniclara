@extends('admin.comman.master1')
@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Prescription 
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                  Medicines
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                  Test Group
                </button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                  Medicines Group
                </button>
             
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                  Advice Groups
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                  Diet Groups
                </button>
                <!-- <br /> -->
                </div>
       <div class="col-xs-2">
          <div class="box box-default" style="margin-top: 6px;">
          <select class="form-control" name="doctor" id="doctor" onchange="doctor_get()" style="background-color: #bccccb;" >
            <option value="">Select Doctor</option>
              
              @php
               
                $log= @session()->get('sess')['log'];
                $type= @session()->get('sess')['type'];
              
             @endphp   
             
             @foreach ($doctor as $key => $value) 
                   @if($type==3) 
                  <option value="<?php echo $value->id; ?>"<?php if($value->id==$log){echo 'selected';}  ?>><?php echo $value->name; ?></option>                            
                  @else  
               <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
               @endif
           @endforeach
          </select>
         </div>
       </div>
      </div>
     </div>


                
              </div>
              <!-- /.card -->
            </div>

           
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->


<!-- moderl strt -->

      
      <!-- /.modal -->

      <div class="modal fade" id="modal-primary">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Medicines Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                    <form action="<?php //echo $action; ?>" method="post" id="medi_info_form" name="medi_info_form">
                 <div class="row">
                         @csrf
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="varchar">Medicine Name </label>
                            
                            <select class="form-control" name="medi_name" id="medi_name">
                                    <option value="">Select</option>
                             @foreach ($medicines as $key => $value)
                                               
                                 <option value="<?php echo $value->id;?>"><?php echo $value->name ?></option>

                               @endforeach
                            </select>
                             <p style="color:green" id="medi_name_error"></p>
                        </div> 
                    </div>
                
                             
                   <div class="col-md-3">
                     <div class="form-group">
                      <label for="varchar">When </label>
                     <select class="form-control" name="medi_when" id="medi_when">
                               <option value="">Select</option>
                               @foreach ($medi_time as $key => $value) 
                                 
                                 <option value="<?php echo $value->id;?>"><?php echo $value->name ?></option>

                            @endforeach
                            </select>
                             <p style="color:green" id="medi_when_error"></p>

                     </div>
                   </div>

                 <div class="col-md-2">
                     <div class="form-group">
                      <label for="varchar">Frequency </label>
                       <select class="form-control" name="medi_freq" id="medi_freq">
                                 <option value="">Select</option>
                                 <option value="1">Daily</option>
                                 <option value="2">Weekly</option>
                                 <option value="3">Monthly</option>

                     </select>
                          <p style="color:green" id="medi_freq_error"></p>
                     </div>
                  </div>  


                   <div class="col-md-2">
                     <div class="form-group">
                      <label for="varchar">Duration </label>
                     <input type="text" class="form-control" name="medi_dur" id="medi_dur " placeholder="Name" value="<?php //echo $name; ?>" />

                   </div>
                 </div>  

                  <div class="col-md-2">
                     <div class="form-group">
                     <label for="varchar">Days </label>
                      <select class="form-control" name="medi_days" id="medi_days">
                                <option value="">Select</option>
                                 <option value="1">Days</option>
                                 <option value="2">Week</option>
                                 <option value="3">Month</option>

                     </select>

                   </div>
                 </div>  
           </div>

           <div class="row">

              <div class="col-md-4">
                     <div class="form-group">
                    <label for="varchar">Special Instructions </label>
                     <select class="form-control" name="medi_instr" id="medi_instr">
                              
                                <option value="">Select</option>
                                 <option value="1">After Food</option>
                                 <option value="2">Before Food</option>
                                 <option value="3">With Food</option>

                           
                     </select>

                  </div>
                 </div> 


                     <div class="col-md-4">
                     <div class="form-group">
                    <label for="varchar">Alternate Medicine </label>
                    <input type="text" class="form-control" name="medi_alter" id="medi_alter" placeholder="Name" value="<?php //echo $name; ?>" />

                  </div>
                 </div>   
              
                <input type="hidden" name="doctor_id" id="doctor_id" value="">
               <input type="hidden" name="medi_info_id" id="medi_info_id" value="" /> 
               <div class="col-md-4">
            <div class="modal-footer">
               
                     <button type="button" class="btn btn-outline-light" id="" onclick="createmedi_info()" style="height: 50px;">Submit</button>
              </div>
          </div>
       </div>
      </form>

               

       <table class="table table-bordered table-striped" id="medi_info_list">
         <thead>
            <tr>
              <th>id</th>
               <th>Medicine name</th>
               <th>When</th>
               <th>Frequency</th>
               <th>Duration</th>
               <th>Special Instructions</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if($medi_info): ?>   
            <?php foreach($medi_info as $medi_info):

                if($medi_info->medi_freq==1){
                  $fre='Daily';
                }

                 elseif($medi_info->medi_freq==2){
                  $fre='Weekly';
                }

                elseif($medi_info->medi_freq==3){
                  $fre='Monthly';
                } 

                if($medi_info->medi_days==1){
                    $day='days';
                }

                elseif($medi_info->medi_days==2){
                    $day='week';
                }

                elseif($medi_info->medi_days==3){
                    $day='Month';
                }

                if($medi_info->medi_instr==1){
                    $medi_instr='With food';
                }

                elseif($medi_info->medi_instr==2){
                    $medi_instr='Before Food';
                }

                elseif($medi_info->medi_instr==3){
                    $medi_instr='After Food';
                }
               

              ?>

            <tr id="row_<?php echo $medi_info->id;?>">
              <td>{{ $medi_info->id }}</td>
             <td><?php  $res=DB::table('medicines')->find($medi_info->medi_name); if($res){echo $res->name;} ?></td>  
             <td><?php  $res=DB::table('medi_time')->find($medi_info->medi_when); if($res){echo $res->name;} ?></td>  
               <td><?php echo $fre;?></td>
               <td><?php echo $medi_info->medi_dur.'-'.$day;?></td>
               <td><?php echo $medi_instr;?></td>
              <td>
               <a href="javascript:void(0)"  data-id="<?php echo $medi_info->id;?>" onclick="editmedi_info(event.target)"  class="btn btn-info edit-medi_pres">Edit</a>
              <a href="javascript:void(0)" data-id="<?php echo $medi_info->id;?>" onclick="deletemedi_info(event.target)" class="btn btn-danger delete-user delete-medi_pres">Delete</a>
               </td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?> 
         </tbody>
      </table>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Secondary Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
           <form name="test_group_form" id="test_group_form" method="post" action="" >
                @csrf
                <div class="row">
                 <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="group_name"  name="group_name" value="" placeholder="group Name"  style="height: 50px;">
                   <p style="color:green" id="group_name_error"></p>
              </div>
              </div>

              <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Test</label>
                 <textarea class="form-control" id="test"  name="test" value=""  style="height: 50px;" placeholder="Enter Test"></textarea> 
                     <p style="color:green" id="test_error"></p>
              </div>
              </div>
              <div class="col-md-4" style="margin-top: 15px;"> 
             <div class="modal-footer justify-content-between">
                <input type="hidden" name="test_group_id" id="test_group_id" value="">
                <input type="hidden" name="doctor_id" id="doctor_id" value="">
                <button type="button" class="btn btn-outline-light" id="" onclick="createtest_group()" style="height: 50px;">Submit</button>
              </div>
            </div>
          </div>
              </form>

         <table class="table table-bordered table-striped" id="test_group_list">
           <thead>
            <tr>
               <th>ID</th>
               <th>Test Group</th>
               <th>test</th>
               <!-- <th>Descriptionn</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if($test_group)   
            @foreach($test_group as $test_group)
            <tr id="row_<?php echo $test_group->id;?>">
               <td><?php echo $test_group->id;?></td>
               <td><?php echo $test_group->group_name;?></td>
               <td><?php echo $test_group->test;?></td>
               <!-- <td><?php //echo $product->description;?></td> -->
               <td>
                  <a href="javascript:void(0)" data-id="{{ $test_group->id }}" onclick="edittest_group(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $test_group->id }}" class="btn btn-danger" onclick="deletetest_group(event.target)">Delete</a>
               </td>
            </tr>
             @endforeach
            @endif
         </tbody>
      </table>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- Test group end-->

      <div class="modal fade" id="modal-info">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Medicines Group</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form name="medi_group_form" id="medi_group_form" method="post" action="" >
                @csrf
                <div class="row">
                 <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">medi_group name</label>
             <input type="text" class="form-control" id="medi_group_name" name="medi_group_name" value="" placeholder="medi_group_name"  style="height: 50px;">
                   <p style="color:green" id="medi_group_name_error"></p>
              </div>
              </div>

              <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Medicines</label>
                 <textarea class="form-control" id="medicines"  name="medicines" value=""  style="height: 50px;" placeholder="Enter medicines"></textarea> 
                     <p style="color:green" id="medicines_error"></p>
              </div>
              </div>
              <div class="col-md-4" style="margin-top: 15px;"> 
             <div class="modal-footer justify-content-between">
                <input type="hidden" name="medi_group_id" id="medi_group_id" value="">
                <input type="hidden" name="doctor_id" id="doctor_id" value="">
                <button type="button" class="btn btn-outline-light" id="" onclick="createmedi_group()" style="height: 50px;">Submit</button>
              </div>
            </div>
          </div>
              </form>

               <table class="table table-bordered table-striped" id="medi_group_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>medi Group</th>
               <th>medicines</th>
               <!-- <th>Descriptionn</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if($medi_group)   
            @foreach($medi_group as $medi_group)
            <tr id="row_<?php echo $medi_group->id;?>">
               <td><?php echo $medi_group->id;?></td>
               <td><?php echo $medi_group->medi_group_name;?></td>
               <td><?php echo $medi_group->medicines;?></td>
               <!-- <td><?php //echo $product->description;?></td> -->
               <td>
                  <a href="javascript:void(0)" data-id="{{$medi_group->id }}" onclick="editmedi_group(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $medi_group->id }}" class="btn btn-danger" onclick="deletemedi_group(event.target)">Delete</a>
               </td>
            </tr>
             @endforeach
            @endif
         </tbody>
      </table>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


<!-- Medcines group end -->

      <div class="modal fade" id="modal-warning">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-warning">
            <div class="modal-header">
              <h4 class="modal-title">Advice Group</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <form name="advice_group_form" id="advice_group_form" method="post" action="" >
                @csrf
                <div class="row">
                 <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">advice_group_name</label>
          <input type="text" class="form-control" id="advice_group_name" name="advice_group_name" value="" placeholder="advice_group_name"  style="height: 50px;">
                   <p style="color:green" id="advice_group_name_error"></p>
              </div>
              </div>

              <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Advice</label>
                 <textarea class="form-control" id="advice"  name="advice" value=""  style="height: 50px;" placeholder="Enter advice"></textarea> 
                     <p style="color:green" id="advice_error"></p>
              </div>
              </div>
              <div class="col-md-4" style="margin-top: 15px;"> 
             <div class="modal-footer justify-content-between">
                <input type="hidden" name="advice_group_id" id="advice_group_id" value="">
                <input type="hidden" name="doctor_id" id="doctor_id" value="">
                <button type="button" class="btn btn-outline-light" id="adbtn" onclick="createadvice_group()" style="height: 50px;">Submit</button>
              </div>
            </div>
          </div>
              </form>

               <table class="table table-bordered table-striped" id="advice_group_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>advice_group_name </th>
               <th>Advice</th>
               <!-- <th>Descriptionn</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if($advice_group)   
            @foreach($advice_group as $advice_group)
            <tr id="row_<?php echo $advice_group->id;?>">
               <td><?php echo $advice_group->id;?></td>
               <td><?php echo $advice_group->advice_group_name;?></td>
               <td><?php echo $advice_group->advice;?></td>
               <!-- <td><?php //echo $product->description;?></td> -->
               <td>
                  <a href="javascript:void(0)" data-id="{{$advice_group->id }}" onclick="editadvice_group(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $advice_group->id }}" class="btn btn-danger" onclick="deleteadvice_group(event.target)">Delete</a>
               </td>
            </tr>
             @endforeach
            @endif
         </tbody>
      </table>
            </div>
            <!-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-dark">Save changes</button>
            </div> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Advice Groups end -->

      <div class="modal fade" id="modal-success">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title">Diet Groups</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form name="diet_group_form" id="diet_group_form" method="post" action="" >
                @csrf
                <div class="row">
                 <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">diet_group_name</label>
          <input type="text" class="form-control" id="diet_group_name" name="diet_group_name" value="" placeholder="advice_group_name"  style="height: 50px;">
                   <p style="color:green" id="diet_group_name_error"></p>
              </div>
              </div>

              <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">diet</label>
                 <textarea class="form-control" id="diet"  name="diet" value=""  style="height: 50px;" placeholder="Enter advice"></textarea> 
                     <p style="color:green" id="diet_error"></p>
              </div>
              </div>
              <div class="col-md-4" style="margin-top: 15px;"> 
             <div class="modal-footer justify-content-between">
                <input type="hidden" name="diet_group_id" id="diet_group_id" value="">
                <input type="hidden" name="doctor_id" id="doctor_id" value="">
                <button type="button" class="btn btn-outline-light" id="adbtn" onclick="creatediet_group()" style="height: 50px;">Submit</button>
              </div>
            </div>
          </div>
              </form>

               <table class="table table-bordered table-striped" id="diet_group_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>diet_group_name </th>
               <th>diet</th>
               <!-- <th>Descriptionn</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if($diet_group)   
            @foreach($diet_group as $diet_group)
            <tr id="row_<?php echo $diet_group->id;?>">
               <td><?php echo $diet_group->id;?></td>
               <td><?php echo $diet_group->diet_group_name;?></td>
               <td><?php echo $diet_group->diet;?></td>
               <!-- <td><?php //echo $product->description;?></td> -->
               <td>
                  <a href="javascript:void(0)" data-id="{{ $diet_group->id }}" onclick="editdiet_group(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $diet_group->id }}" class="btn btn-danger" onclick="deletediet_group(event.target)">Delete</a>
               </td>
            </tr>
             @endforeach
            @endif
         </tbody>
      </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


     

    </section>

      @endsection
 @section('script')

    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>


    <script type="text/javascript">
     $(document).ready(function(){
       
   
});
     function doctor_get(){
       var doc_id=$("#doctor option:selected").val();
        // alert(doc_id);
        $('#doctor_id').val(doc_id);

     }


     function edittest_group(event) {
        var id  = $(event).data("id");
        let _url = `/test_group_edit/${id}`;
           // alert(_url);
        $.ajax({
          url: _url,
          type: "GET",
          success: function(response) {
            if(response) {
            // alert(response);
            $("#test_group_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#group_name").val(response.group_name);
            $("#test").val(response.test);
                    
          }
          }
        });
      }


  function createtest_group() {
      
    var update_id=  $('#test_group_id').val();
     
    let _url  = '{{ url('test_group') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#test_group_form').serialize(),
        success: function(response) {
          alert('hello');
          alert( response.data.id);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.group_name+'</td><td>'+response.data.test+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="edittest_group(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletetest_group(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                 }
                  else {
                     
                     $('#test_group_list').prepend(product);                    
                 }
                $('#test_group_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#group_name_error').text(response.responseJSON.errors.group_name);
          $('#test_error').text(response.responseJSON.errors.test);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deletetest_group(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/test_group_del/${id}`;
      
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


// Mdecines Group



 function editmedi_group(event) {
        var id  = $(event).data("id");
        let _url = `/medi_group_edit/${id}`;
           // alert(_url);
        $.ajax({
          url: _url,
          type: "GET",
          success: function(response) {
            if(response) {
            // alert(response);
            $("#medi_group_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#medi_group_name").val(response.medi_group_name);
            $("#medicines").val(response.medicines);
                    
          }
          }
        });
      }


  function createmedi_group() {
      
    var update_id=  $('#medi_group_id').val();
     alert(update_id);
    let _url  = '{{ url('medi_group') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#medi_group_form').serialize(),
        success: function(response) {
          alert('hello');
          alert( response.data.id);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.medi_group_name+'</td><td>'+response.data.medicines+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editmedi_group(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletemedi_group(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                 }
                  else {
                     
                     $('#medi_group_list').prepend(product);                    
                 }
                $('#medi_group_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#medi_group_name_error').text(response.responseJSON.errors.medi_group_name);
          $('#medicines_error').text(response.responseJSON.errors.medicines);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deletemedi_group(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/medi_group_del/${id}`;
      
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

// Advice Group

    function editadvice_group(event) {
        var id  = $(event).data("id");
        let _url = `/advice_group_edit/${id}`;
           // alert(_url);
        $.ajax({
          url: _url,
          type: "GET",
          success: function(response) {
            if(response) {
            // alert(response);
            $("#advice_group_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#advice_group_name").val(response.advice_group_name);
            $("#advice").val(response.advice);
            $("#adbtn").html('update');
                    
          }
          }
        });
      }


  function createadvice_group() {
      
    var update_id=  $('#advice_group_id').val();
    
    alert(update_id);
    let _url  = '{{ url('advice_group') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#advice_group_form').serialize(),
        success: function(response) {
          alert('hello');
          alert( response.data.id);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.advice_group_name+'</td><td>'+response.data.advice+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editadvice_group(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deleteadvice_group(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                     // $('#advice_group_id').val("");
                 }
                  else {
                     
                     $('#advice_group_list').prepend(product);                    
                 }
                $('#advice_group_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#advice_group_name_error').text(response.responseJSON.errors.advice_group_name);
          $('#advice_error').text(response.responseJSON.errors.advice);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deleteadvice_group(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/advice_group_del/${id}`;
      
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

// Diet Groups

    function editdiet_group(event) {
        var id  = $(event).data("id");
        let _url = `/diet_group_edit/${id}`;
           // alert(_url);
        $.ajax({
          url: _url,
          type: "GET",
          success: function(response) {
            if(response) {
            // alert(response);
            $("#diet_group_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#diet_group_name").val(response.diet_group_name);
            $("#diet").val(response.diet);
            // $("#adbtn").html('update');
                    
          }
          }
        });
      }


  function creatediet_group() {
      
    var update_id= $('#diet_group_id').val();
    
    alert(update_id);
    let _url  = '{{ url('diet_group') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#diet_group_form').serialize(),
        success: function(response) {
          alert('hello');
          alert( response.data.id);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.diet_group_name+'</td><td>'+response.data.diet+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editdiet_group(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletediet_group(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    
                     // $("#row_" +response.data.id).replaceWith(product);
                     $("#row_" +update_id).replaceWith(product);
                    
                 }
                  else {
                     
                     $('#diet_group_list').prepend(product);                    
                 }
                $('#diet_group_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#diet_group_name_error').text(response.responseJSON.errors.diet_group_name);
          $('#diet_error').text(response.responseJSON.errors.diet);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deletediet_group(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/diet_group_del/${id}`;
      
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






  function editmedi_info(event) {
    var id  = $(event).data("id");
    let _url = `/pres/${id}/edit`;
       // alert(_url);
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
        if(response) {
        // alert(response.name);
            $("#medi_info_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#medi_name").val(response.medi_name);
            $("#medi_when ").val(response.medi_when );
            $("#medi_freq").val(response.medi_freq);
            $("#medi_dur").val(response.medi_dur);
            $("#medi_days").val(response.medi_days);
            $("#medi_instr").val(response.medi_instr);
            $("#medi_alter").val(response.medi_alter);
          

          
          
          }
      }
    });
  }


  function createmedi_info() {
      
    var update_id= $('#medi_info_id').val();
     
    let _url  = '{{ url('pres') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#medi_info_form').serialize(),
        success: function(response) {
          // alert('hello');
          // alert( response.data.name);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.medi_name+'</td><td>'+response.data.medi_when+'</td><td>'+response.data.medi_freq+'</td><td>'+response.data.medi_dur+'-'+response.data.medi_days+'</td><td>'+response.data.medi_instr+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editmedi_info(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletemedi_info(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                 }
                  else {
                     
                     $('#medi_info_list').prepend(product);                    
                 }
                $('#medi_info_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#medi_name_error').text(response.responseJSON.errors.medi_name);
          $('#medi_when_error').text(response.responseJSON.errors.medi_when);
          $('#medi_freq_error').text(response.responseJSON.errors.medi_freq);
        }
      });
  }



  function deletemedi_info(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/pres/${id}`;
      // alert(id);
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