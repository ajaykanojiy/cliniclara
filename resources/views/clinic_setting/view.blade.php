@extends('admin.comman.master1')
@section('content')

<div class="card-body">
                
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                  Create Service
                </button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                  Create Vital
                </button>

                 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_medi">
                  Create Medicines
                </button>

                 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_medi_time">
                  Create Medi Time
                </button>

              </div>



      <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Service</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form name="service_form" id="service_form" method="post" action="" >
                @csrf
                <div class="row">
                 <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"  name="name" value="" placeholder="Enter Name">
                   <p style="color:green" id="name_error"></p>
              </div>
              </div>

              <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Fees amount</label>
                    <input type="text" class="form-control" id="fees_amount"  name="fees_amount" value="" placeholder="Enter fees amount">
                     <p style="color:green" id="fees_error"></p>
              </div>
              </div>
              <div class="col-md-4" style="margin-top: 15px;"> 
             <div class="modal-footer justify-content-between">
                <input type="hidden" name="service_id" id="service_id" value="">
                <button type="button" class="btn btn-outline-light" id="" onclick="createservice()">Submit</button>
              </div>
            </div>
          </div>
              </form>

               <table class="table table-bordered table-striped" id="service_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Fess</th>
               <!-- <th>Descriptionn</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if($service)   
            @foreach($service as $service)
            <tr id="row_<?php echo $service->id;?>">
               <td><?php echo $service->id;?></td>
               <td><?php echo $service->name;?></td>
               <td><?php echo $service->fees_amount;?></td>
               <!-- <td><?php //echo $product->description;?></td> -->
               <td>
                  <a href="javascript:void(0)" data-id="{{ $service->id }}" onclick="editservice(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $service->id }}" class="btn btn-danger" onclick="deleteservice(event.target)">Delete</a>
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

      <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Vital </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form name="vital_form" id="vital_form" method="post" action="" >
                @csrf
                <div class="row">
                 <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name_vital"  name="name_vital" value="" placeholder="Enter Name">
                   <p style="color:green" id="name_error_vital"></p>
              </div>
              </div>

              <!-- <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Fees amount</label>
                    <input type="text" class="form-control" id="fees_amount"  name="fees_amount" value="" placeholder="Enter fees amount">
                     <p style="color:green" id="fees_error"></p>
              </div>
              </div> -->
              <div class="col-md-4" style="margin-top: 15px;"> 
             <div class="modal-footer justify-content-between">
                <input type="hidden" name="vital_id" id="vital_id" value="">
                <button type="button" class="btn btn-outline-light" id="" onclick="createvital()">Submit</button>
              </div>
            </div>
          </div>
              </form>

               <table class="table table-bordered table-striped" id="vital_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <!-- <th>Fess</th> -->
               <!-- <th>Descriptionn</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if($vital)   
            @foreach($vital as $vital)
            <tr id="row_<?php echo $vital->id;?>">
               <td><?php echo $vital->id;?></td>
               <td><?php echo $vital->name;?></td>
               
               <td>
                  <a href="javascript:void(0)" data-id="{{ $vital->id }}" onclick="editvital(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $vital->id }}" class="btn btn-danger" onclick="deletevital(event.target)">Delete</a>
               </td>
            </tr>
             @endforeach
            @endif
         </tbody>
      </table>
            </div>
            <!-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

 <!-- Medecines start  -->   

          <div class="modal fade" id="modal_medi">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">medicines </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form name="medicines_form" id="medicines_form" method="post" action="" >
                @csrf
                <div class="row">
                 <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name_medicines"  name="name_medicines" value="" placeholder="Enter Name">
                   <p style="color:green" id="name_medicines_error"></p>
              </div>
              </div>

            
              <div class="col-md-4" style="margin-top: 15px;"> 
             <div class="modal-footer justify-content-between">
                <input type="hidden" name="medicines_id" id="medicines_id" value="">
                <button type="button" class="btn btn-outline-light" id="" onclick="createmedicines()">Submit</button>
              </div>
            </div>
          </div>
              </form>

               <table class="table table-bordered table-striped" id="medicines_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <!-- <th>Fess</th> -->
               <!-- <th>Descriptionn</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if($medicines)   
            @foreach($medicines as $medicines)
            <tr id="row_<?php echo $medicines->id;?>">
               <td><?php echo $medicines->id;?></td>
               <td><?php echo $medicines->name;?></td>
               
               <td>
                  <a href="javascript:void(0)" data-id="{{ $medicines->id }}" onclick="editmedicines(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $medicines->id }}" class="btn btn-danger" onclick="deletemedicines(event.target)">Delete</a>
               </td>
            </tr>
             @endforeach
            @endif
         </tbody>
      </table>
            </div>
            <!-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- medi_time -->

          <div class="modal fade" id="modal_medi_time">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Medi Time </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form name="medi_time_form" id="medi_time_form" method="post" action="" >
                @csrf
                <div class="row">
                 <div class="col-md-4"> 
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name_medi_time"  name="name_medi_time" value="" placeholder="Enter Name">
                   <p style="color:green" id="name_medi_time_error"></p>
              </div>
              </div>

            
              <div class="col-md-4" style="margin-top: 15px;"> 
             <div class="modal-footer justify-content-between">
                <input type="hidden" name="medi_time_id" id="medi_time_id" value="">
                <button type="button" class="btn btn-outline-light" id="" onclick="createmedi_time()">Submit</button>
              </div>
            </div>
          </div>
              </form>

               <table class="table table-bordered table-striped" id="medi_time_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <!-- <th>Fess</th> -->
               <!-- <th>Descriptionn</th> -->
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if($medi_time)   
            @foreach($medi_time as $medi_time)
            <tr id="row_<?php echo $medi_time->id;?>">
               <td><?php echo $medi_time->id;?></td>
               <td><?php echo $medi_time->name;?></td>
               
               <td>
                  <a href="javascript:void(0)" data-id="{{ $medi_time->id }}" onclick="editmedi_time(event.target)" class="btn btn-info">Edit</a>
                   
                    <a href="javascript:void(0)" data-id="{{ $medi_time->id }}" class="btn btn-danger" onclick="deletemedi_time(event.target)">Delete</a>
               </td>
            </tr>
             @endforeach
            @endif
         </tbody>
      </table>
            </div>
            <!-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
});
         function editservice(event) {
    var id  = $(event).data("id");
    let _url = `/service/${id}/edit`;
       // alert(_url);
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
        if(response) {
        // alert(response);
            $("#service_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#name").val(response.name);
            $("#fees_amount").val(response.fees_amount);
          
          
          }
      }
    });
  }


  function createservice() {
      
    var update_id=  $('#service_id').val();
     
    let _url  = '{{ url('service') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#service_form').serialize(),
        success: function(response) {
          alert('hello');
          alert( response.data.id);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td><td>'+response.data.fees_amount+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editservice(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deleteservice(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                 }
                  else {
                     
                     $('#service_list').prepend(product);                    
                 }
                $('#service_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#name_error').text(response.responseJSON.errors.name);
          $('#fees_error').text(response.responseJSON.errors.fees_amount);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deleteservice(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/service/${id}`;
      
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


// vital


  function editvital(event) {
    var id  = $(event).data("id");
    let _url = `/vital_edit/${id}`;
       // alert(_url);
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
        if(response) {
        // alert(response.name);
            $("#vital_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#name_vital").val(response.name);
            // $("#fees_amount").val(response.fees_amount);
          
          
          }
      }
    });
  }


  function createvital() {
      
    var update_id=  $('#vital_id').val();
     
    let _url  = '{{ url('vital') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#vital_form').serialize(),
        success: function(response) {
          // alert('hello');
          // alert( response.data.name);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editvital(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletvital(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                 }
                  else {
                     
                     $('#vital_list').prepend(product);                    
                 }
                $('#vital_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#name_error_vital').text(response.responseJSON.errors.name_vital);
          // $('#fees_error').text(response.responseJSON.errors.fees_amount);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deletevital(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/vital_del/${id}`;
      
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

// Medicines


       function editmedicines(event) {
    var id  = $(event).data("id");
    let _url = `/medicines_edit/${id}`;
       // alert(_url);
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
        if(response) {
        // alert(response.name);
            $("#medicines_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#name_medicines").val(response.name);
            // $("#fees_amount").val(response.fees_amount);
          
          
          }
      }
    });
  }


  function createmedicines() {
      
    var update_id=  $('#medicines_id').val();
     // alert(update_id);
    let _url  = '{{ url('medicines') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#medicines_form').serialize(),
        success: function(response) {
          // alert('hello');
          // alert( response.data.name);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editmedicines(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletemedicines(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                 }
                  else {
                     
                     $('#medicines_list').prepend(product);                    
                 }
                $('#medicines_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#name_medicines_error').text(response.responseJSON.errors.name_medicines);
          // $('#fees_error').text(response.responseJSON.errors.fees_amount);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deletemedicines(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/medicines_del/${id}`;
      
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

// medi time

      function editmedi_time(event) {
    var id  = $(event).data("id");
    let _url = `/medi_time_edit/${id}`;
       // alert(_url);
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
        if(response) {
        // alert(response.name);
            $("#medi_time_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#name_medi_time").val(response.name);
            // $("#fees_amount").val(response.fees_amount);
          
          
          }
      }
    });
  }


  function createmedi_time() {
      
    var update_id=  $('#medi_time_id').val();
     // alert(update_id);
    let _url  = '{{ url('medi_time') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#medi_time_form').serialize(),
        success: function(response) {
          // alert('hello');
          // alert( response.data.name);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editmedi_time(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletemedi_time(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    // alert(update_id);

                     $("#row_" +update_id).replaceWith(product);
                 }
                  else {
                     
                     $('#medi_time_list').prepend(product);                    
                 }
                $('#medi_time_form').trigger("reset");

            }
        },
        error: function(response) {
          $('#name_medi_time_error').text(response.responseJSON.errors.name_medi_time);
          // $('#fees_error').text(response.responseJSON.errors.fees_amount);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deletemedi_time(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/medi_time_del/${id}`;
      
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