@extends('admin.comman.master1')
@section('stylesheet')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <style type="text/css">
     
     .modal-dialog {
  position:absolute;
  top:50% !important;
  left:30% !important;
  transform: translate(0, -50%) !important;
  -ms-transform: translate(0, -50%) !important;
  -webkit-transform: translate(0, -50%) !important;
  margin:auto 5%;
  width:90%;
  height:50%;
}
.modal-content {
  min-height:100%;
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  right:0; 
}
.modal-body {
  position:absolute;
  top:45px; /** height of header **/
  bottom:45px;  /** height of footer **/
  left:0;
  right:0;
  overflow-y:auto;
}
.modal-footer {
  position:absolute;
  bottom:0;
  left:0;
  right:0;
}    
  

    </style>

    @endsection
@section('content')
<section class="content">
      <div class="container-fluid">

       <div class="row">
          <div class="col-md-12">
          </div>
        </div>
        

       
           <div class="card">
              <div class="card-header p-2">
              <div class="row">
                <div class="col-md-3">
                   <!-- <div class="text-center"> -->
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('storage/avatars/'.$row->image)}}"
                       alt="User profile picture">
                <!-- </div> -->

                <h3 class="profile-username text-center">{{$row->name}}</h3>

                <p class="text-muted text-center">
                  @php
                   if($row->sex==1){
                  echo 'male';}
                   elseif($row->sex==2){
                  echo 'Female';} 
                   else{
                  echo 'Other';}  
                  @endphp
                </p>
                </div>
                @php
                 $servi= DB::table("p_services")->get()->sum("amount");
                 $payme= DB::table("payments")->get()->sum("amount");
                  $bal=$servi-$payme;
                 @endphp
                <div class="col-md-3">
                  <li class="list-group-item">
                    <b>Balance:</b> <a class="float-right">{{$bal}}</a>
                  </li>
                </div>

                <div class="col-md-3">
                  <li class="list-group-item">
                    <b>Total Services:</b> <a class="float-right">{{$servi}}</a>
                  </li>
                </div>

                <div class="col-md-3">
                  <li class="list-group-item">
                    <b>Total Received:</b> <a class="float-right">{{$payme}}</a>
                  </li>
                </div>
                
              </div><!-- /.card-header -->
             <!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
         
          <!-- /.col -->
        </div>

          <!-- /.col -->
<div class="row">
   <div class="col-md-12">
     <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#pd" data-toggle="tab">Patient details</a></li>
            <li class="nav-item"><a class="nav-link" href="#pres" data-toggle="tab">Prescription</a></li>
            <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">History</a></li>
            <li class="nav-item"><a class="nav-link" href="#billing" data-toggle="tab">Billing</a></li>
            <li class="nav-item"><a class="nav-link" href="#service" data-toggle="tab">Services Offered</a></li>
            <li class="nav-item"><a class="nav-link" href="#payment" data-toggle="tab">Payments Received</a></li>
            <li class="nav-item"><a class="nav-link" href="#bill" data-toggle="tab">Bills Generated</a></li>
          </ul>
        </div><!-- /.card-header -->
      <div class="card-body">
         <div class="tab-content">
            <div class="active tab-pane" id="pd">
                        <!-- Post -->
                       
                        <!-- /.post -->
             </div>
                  <!-- /.tab-pane -->


              <div class="tab-pane" id="pres">
                             
                                  
              </div>
                  <!-- /.tab-pane -->

        <!-- history -->
              <div class="tab-pane" id="history">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName2" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
                  <!-- /.tab-pane -->
    

       <!-- Services     -->
              <div class="tab-pane" id="service">
                    <div class="card">
                        <div class="card-header">
                       
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          Add Service
                          </button>

                          <button type="button" class="btn btn-primary"  id="save_value"    onclick="add_ps()" style="display: none;" >
                          Add Service For Payment
                          </button>
                          <!-- <input type="button" id="save_value" onclick="add_ps()" name="save_value" value="Save" /> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="p_services_list" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th><input type="checkbox" id="checkbox_ps_list" class="ps" onclick="psc()" name=""></th>
                            <th>No</th>
                            <th>Date</th>
                            <th>Service Name</th>
                            <th>Total amount</th>
                            <th>Billed</th>
                            <th>Paid</th> 
                            <th>Action</th>                 
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp 
                            @foreach($lists as $list) 

                            <tr id="row_<?php echo $list->id;?>">
                            <td><input type="checkbox" name="options[]" id="checkbox_ps_list_{{$list->id}}" class="ps" value="{{$list->id}}" onclick="psc()" ></td>
                            <td>{{$list->id}}</td>
                            <td>{{date('d-m-Y',strtotime($list->date))}}</td>

                            <td> <?php $res=DB::table('services')->find($list->service_name); if($res){echo $res->name;} ?> </td>
                            <td>{{$list->total}}</td>
                            <td>{{($list->bill_status==1)?'Unbilled':'Billed'}}</td>            
                            <td>{{($list->amount_status==1)?'Unapaid':'Paid'}}</td>            
                                
                            <td>
                            <a href="javascript:void(0)" data-id="{{ $list->id }}" onclick="editp_services(event.target)" class="btn btn-info">Edit</a>

                            <a href="javascript:void(0)" data-id="{{ $list->id }}" class="btn btn-danger" onclick="deletep_services(event.target)">Delete</a>

                            </td>

                            </tr>
                            @endforeach

                            </tbody>

                            </table>
                        </div>

                        <!-- Modal for Service -->
                                 <!-- Button to Open the Modal -->
                           

                            <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-lg">
                         <div class="modal-content">

                            <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Add Service</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>

                            <!-- Modal body -->
                 <div class="modal-body">
                       <form id="p_services_form" name="p_services_form" action="{{--url('p_service')--}}" method="post" autocomplete="off" >
                            @csrf
                            <div class="row">
                            <div class="col-md-6">
                            <label>Date</label>
                            <input type="text" class="form-control datepicker " name="date" id="date" >


                            </div>

                            <div class="col-md-6">
                            <label>Service</label>
                            <select class="form-control" name="service_name" id="service_name" onchange="get_service()">
                            <option value="">Select</option>
                            @foreach($ser as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                            </select>
                            </div>
                            </div>

                            <br><br>
                            <div class="row">
                            <div class="col-sm-3">
                            <label>Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity"  onkeyup="">
                            </div>

                            <div class="col-sm-3">
                            <label>Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount">
                            </div>

                            <div class="col-sm-3">
                            <label>Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount"  onchange="">
                            </div>


                            </div>

                            

                            <div class="modal-footer">
                            <input type="hidden" name="p_services_id" id="p_services_id" value="">
                            <input type="hidden" name="patinet_id" id="patinet_id" value="{{$patient_id}}">
                            <button type="button" class="btn btn-danger" onclick="createp_services()" data-dismiss="modal">Add</button>
                            </div>
                       </form>


                    </div>

                            <!-- Modal footer -->


                            </div>
                            </div>
                        </div>
                    <!-- End Model -->
                    <!-- /.card-body -->
                    </div>
              </div>
      <!-- /.tab-pane -->
      <!-- //Service -->
   
   <!-- payments -->
          <div class="tab-pane" id="payment">
                    <div class="card">
                        <div class="card-header">
                       
                           <form id="payments_form" name="payments_form" action="{{--url('p_service')--}}" method="post" autocomplete="off" >
                            @csrf
                            <div class="row">
                            <div class="col-md-3">
                            <label>Date</label>
                            <input type="text" class="form-control datepicker " name="pay_date" id="pay_date" >
                            </div>


                           <div class="col-md-3">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="pay_amount" id="pay_amount" >
                            </div>

                            <div class="col-md-3">
                            <label>Payment Mode</label>
                            <select class="form-control" name="pay_mode" id="pay_mode" onchange="get_mode()">
                            <option value="">Select</option>
                           
                            <option value="1">Cash</option>
                            <option value="2">Card</option>
                            <option value="3">Oniline</option>
                            <option value="4">Other</option>
                          
                            </select>
                            </div>
                            

                            

                            

                            <div class="col-md-3">
                            <input type="hidden" name="payments_id" id="payments_id" value="">
                            <input type="hidden" name="ps_amount_status" id="ps_amount_status" value="">
                            <!-- <input type="hidden" name="patient_id" id="patinet_id" value="{{$patient_id}}"> -->
                            <button type="button" class="btn btn-danger" onclick="createpayments()" data-dismiss="modal" style="margin-top: 30px;">Add</button>
                            </div>
                          </div>
                       </form>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="payments_list" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <!-- <th>No</th> -->
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Payment mode</th>
                           
                            <th>Action</th>                 
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp 
                            @foreach($pay as $list) 
                              @php
                               if($list->pay_mode==1){
                                    $mode='Cash';
                                  }
                                   elseif($list->pay_mode==2){
                                    $mode='Card';
                                  }
                                  elseif($list->pay_mode==3){
                                    $mode='Online';
                                  }
                                  else{

                                    $mode='Other';
                                  }
                       
                               @endphp
                            <tr id="row_<?php echo $list->id;?>">
                            <!-- <td>{{$no++}}</td> -->
                            <td>{{$list->id}}</td>
                            <td>{{date('d-m-Y',strtotime($list->date))}}</td>
                            
                            <td>{{$list->amount}}</td>
                            <td>{{$mode}}</td>            
                                        
                                
                            <td>
                            <a href="javascript:void(0)" data-id="{{ $list->id }}" onclick="editpayments(event.target)" class="btn btn-info">Edit</a>

                            <a href="javascript:void(0)" data-id="{{ $list->id }}" class="btn btn-danger" onclick="deletepayments(event.target)">Delete</a>

                            </td>

                            </tr>
                            @endforeach

                            </tbody>

                            </table>
                        </div>

                       
                    <!-- /.card-body -->
                    </div>          
                                  
              </div>
  <!-- endpayments -->

      <!-- bill Genrate -->
                 <div class="tab-pane" id="bill">
                    <div class="card">
                        <div class="card-header">
                       
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bill_model">
                          Add
                          </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="bills_id_list" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th><input type="checkbox" id="checkboxbills" name=""></th>  
                            <th>No</th>
                            <th>Date</th>
                            <th>Bill No</th>
                            <th>Service Name</th>
                            <th>Amount</th>                           
                            <th>Action</th>                                   
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp 
                            @foreach($bill as $list) 
                              @php
                              
                       
                               @endphp
                            <tr id="row_<?php echo $list->id;?>">
                             <td><input type="checkbox" name="bills_check[]" id="checkboxbills_{{$list->id}}" value="{{$list->id}}"></td>
                            <td>{{$list->id}}</td>
                            <td>{{date('d-m-Y',strtotime($list->date))}}</td>
                            
                            <td>{{$list->bill_no}}</td>
                            <td>{{$list->service_name}}</td>
                            <td>{{$list->amount}}</td>
                                                      
                            <td>
                            <a href="javascript:void(0)" data-id="{{ $list->id }}" onclick="viewbills(event.target)" class="btn btn-info">View</a>

                            <a href="javascript:void(0)" data-id="{{ $list->id }}" class="btn btn-danger" onclick="deletebills_id(event.target)">Delete</a>

                            </td>

                            </tr>
                            @endforeach

                            </tbody>

                            </table>
                        </div>

                        <!-- Modal for Service -->
                                 <!-- Button to Open the Modal -->
                           

                            <!-- The Modal -->
                        <div class="modal" id="bill_model">
                            <div class="modal-dialog modal-lg">
                         <div class="modal-content">

                            <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Add Service</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                 <div class="modal-body">
                       <form id="bills_id_form" name="bills_id_form" action="{{--url('p_service')--}}" method="post" autocomplete="off" >
                            @csrf
                            <input type="hidden" name="cus_id" id="cus_id" value="{{$patient_id}}">
                             <div class="card-body">
                              <button type="button" class="btn btn-danger" onclick="createbill()" data-dismiss="modal">Add</button>
                            </div>
                            <table id="example" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th><input type="checkbox" id="checkboxPrimary" name=""></th>
                            <th>No</th>
                            <th>Date</th>
                            <th>Service Name</th>
                            <th>Qty</th>
                            <th>Amount</th>                           
                            <th>Discount</th>                           
                            <th>Paid</th>                                      
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp 
                            @foreach($lists as $list) 
                               
                              @if($list->bill_status==1)
                       
                               
                            <tr id="row_<?php echo $list->id;?>">
                            <!-- <td>{{$no++}}</td> -->
                            <td><input type="checkbox" name="ser_check[]" id="checkboxPrimary_{{$list->id}}" value="{{$list->id}}"></td>
                            <td>{{$list->id}}</td>
                            <td>{{date('d-m-Y',strtotime($list->date))}}</td>
                            <td> <?php $res=DB::table('services')->find($list->service_name); if($res){echo $res->name;} ?> </td>
                            
                            <td>{{$list->quantity}}</td>
                            <td>{{$list->amount}}</td>
                            <td>{{$list->discount}}</td>
                            <td>{{($list->amount_status==1)?'Unapaid':'Paid'}}</td>
                            
                            </tr>
                            @endif
                            @endforeach

                            </tbody>

                            </table>
                        
                       </form>


                    </div>

                            <!-- Modal footer -->


                            </div>
                            </div>
                        </div>
                    <!-- End Model -->

        
                    <!-- /.card-body -->
                    </div>          
                                  
              </div><!-- endbillGenrate -->

           <!-- bill_print -->
             
             <div class="modal" id="bill_print">
                            <div class="modal-dialog modal-lg">
                         <div class="modal-content">

                            <!-- Modal Header -->
                          

                            <!-- Modal body -->
                 <div class="modal-body">
                         <!-- <div class="card-body">
                              <button type="button" class="btn btn-danger" onclick="createbill()" data-dismiss="modal">Add</button>
                            </div> -->
                            
                           <!--  <table id="bill_print_list" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>Date</th>
                            <th>Service Name</th>
                            <th>Qty</th>
                            <th>Amount</th>                           
                            <th>Discount</th>                           
                            <th>total</th>                                      
                            </tr>
                            </thead>
                            <tbody>
                           
                          

                            </tbody>

                            </table> -->
                        
                       <!-- </form> -->

                           <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> AdminLTE, Inc.
          <small class="float-right" >Date:<span id="bil_date"></span> </small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice <span id="bill_id"></span></b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped"  id="bill_print_list">
          <thead>
          <tr>
          <th>Date</th>
          <th>Service Name</th>
          <th>Qty</th>
          <th>Amount</th>                           
          <th>Discount</th>                           
          <th>total</th>                                      
          </tr>
          </thead>
          <tbody>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
       
      </div>
      <!-- /.col -->
      <div class="col-6">
        <!-- <p class="lead">Amount Due 2/22/2014</p> -->

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Amount:</th>
              <td id="am_to"></td>
            </tr>
            <tr>
              <th>Discount</th>
              <td id="dis_to" ></td>
            </tr>
            
            <tr>
              <th>Total Pay</th>
              <td id="pay_to"></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  <!-- window.addEventListener("load", window.print()); -->
</script>
</body>
</html>



                    </div>

                            <!-- Modal footer -->


                            </div>
                            </div>
                        </div>

          <!-- end Bill_print -->

         </div> <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    @endsection


     @section('script')



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <script>
   $(function() {
     $(".datepicker").datepicker();

      $("#checkboxPrimary").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

         $("input[type=checkbox]").click(function() {
          if (!$(this).prop("checked")) {
        $("#checkboxPrimary").prop("checked", false);
    }
});

});



     
   

   $("#checkbox_ps_list").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
            
         $("input[type=checkbox]").click(function() {
          if (!$(this).prop("checked")) {
        $("#checkbox_ps_list").prop("checked", false);
    }
   
});
  
});


    $("#checkboxbills").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
            
         $("input[type=checkbox]").click(function() {
          if (!$(this).prop("checked")) {
        $("#checkboxbills").prop("checked", false);
    }
   
});
  
});

   });

    function editp_services(event) {
      $('#myModal').modal('show');
       // $('#myModal3').model('show');
        var id  = $(event).data("id");
        // let _url = `/p_services_edit/${id}`;
        let _url = `/p_services/${id}/edit`;
           // alert(_url);
        $.ajax({
          url: _url,
          type: "GET",
          success: function(response) {
            if(response) {
            // alert(response);
            $("#p_services_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#date").val(response.date);
            $("#service_name").val(response.service_name);
            $("#quantity").val(response.quantity);
             var amt=get_service();
            $("#amount").val(amt);
            $("#discount").val(response.discount);
            $("#adbtn").html('update');
                    
          }
          }
        });
      }


  function createp_services() {
      
    var update_id=  $('#p_services_id').val();
    
    alert(update_id);
    let _url  = '{{ url('p_services') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#p_services_form').serialize(),
        success: function(response) {
          alert('hello');
          alert( response.data.service_name);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.date+'</td><td>'+response.data.service_name+'</td><td>'+response.data.total+'</td><td>'+response.data.bill_status+'</td><td>'+response.data.amount_status+'</td>';

            product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editp_services(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletep_services(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                     // $('#advice_group_id').val("");
                 }
                  else {
                     
                     $('#p_services_list').prepend(product);                    
                 }
                $('#p_services_form').trigger("reset");

            }
        },
        // error: function(response) {
        //   $('#advice_group_name_error').text(response.responseJSON.errors.advice_group_name);
        //   $('#advice_error').text(response.responseJSON.errors.advice);
        //   // $('#to_time_error').text(response.responseJSON.errors.to);
        // }
      });
  }



  function deletep_services(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/p_services/${id}`;
      
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

  function get_service(){

  var res= $('#service_name').val();

// alert(res);
     let _url = `/get_amount`;
      
      $.ajax({
        url: _url,
        type: 'get',
        data: {
          "id":res,
          "_token": "{{ csrf_token() }}",
        },
        success: function(response) {
          // alert(response.fees_amount);
          $('#amount').val(response.fees_amount);
        }
      });
  
  }

  // payment

    function editpayments(event) {
      $('#payments_model').modal('show');
        var id  = $(event).data("id");
        alert(id);
        // let _url = `/p_services_edit/${id}`;
        let _url = `/payments/${id}/edit`;
           // alert(_url);
        $.ajax({
          url: _url,
          type: "GET",
          success: function(response) {
            if(response) {
            // alert(response);
            $("#payments_id").val(response.id);
            // $("#doc_id").val(response.doc_id);
            $("#pay_date").val(response.date);
            $("#pay_amount").val(response.amount);
            $("#pay_mode").val(response.pay_mode);
           
            $("#adbtn").html('update');
                    
          }
          }
        });
      }


  function createpayments() {
      
    var update_id=  $('#payments_id').val();
    
    alert(update_id);
    let _url  = '{{ url('payments') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#payments_form').serialize(),
        success: function(response) {
          alert('hello');
          alert( response.data.service_name);
            if(response.code == 200) {
              
                var product='<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.date+'</td><td>'+response.data.amount+'</td><td>'+response.data.pay_mode+'</td>';

           product +='<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editpayments(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletepayments(event.target)">Delete</a></td></tr>';
              

               if (update_id) {
                    

                     $("#row_" +update_id).replaceWith(product);
                     // $('#advice_group_id').val("");
                 }
                  else {
                     
                     $('#payments_list').prepend(product);                    
                 }
                $('#payments_form').trigger("reset");

            }
        },
        // error: function(response) {
        //   $('#advice_group_name_error').text(response.responseJSON.errors.advice_group_name);
        //   $('#advice_error').text(response.responseJSON.errors.advice);
        //   // $('#to_time_error').text(response.responseJSON.errors.to);
        // }
      });
  }



  function deletepayments(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/payments/${id}`;
      
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

 // end payment




  function createbill() {
        
    let _url  = '{{ url('bill') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data: $('#bills_id_form').serialize(),
        success: function(response) {
                   alert(response.bill_date);
            // if(response.code == 200) {
               $('#bill_print').modal('show');
                  var total_sum=0;
                  var amount_sum=0;
                  var discount_sum=0;
                 jQuery.each( response.ps_arry, function( i, val ) {
                 
                  total_sum+=parseInt(val.total);
                  amount_sum+=parseInt(val.amount);
                  discount_sum+=parseInt(val.discount);
                 if(i>0){

                $('#bill_print_list').prepend('<tr id="row_'+val.id+'"><td>'+val.date+'</td><td>'+val.service_name+'</td><td>'+val.quantity+'</td><td>'+val.amount+'</td><td>'+val.discount+'</td><td>'+val.total+'</td></tr>');
                
                 }
                 
               });

                   $('#bill_print_list').append('<tr><th colspan="5">Total</th><td>'+total_sum+'</td></tr>');


                     $('#am_to').html(amount_sum);
                    $('#dis_to').html(discount_sum);
                    $('#pay_to').html(total_sum);
                    $('#bil_date').text(response.bill_date);
                    $('#bill_id').html(response.bill_id);

                    $('#bill_print').on('hidden.bs.modal', function () {
                    $("#bill_print_list tbody").empty();
                     // $("#bill_print_list").empty()
              });

                  // $('#bill_print_list').prepend(product)   
                                   
                
           

            // }
        },
        error: function(response) {
          // $('#advice_group_name_error').text(response.responseJSON.errors.advice_group_name);
          // $('#advice_error').text(response.responseJSON.errors.advice);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        }
      });
  }



  function deletepayments(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/payments/${id}`;
      
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


 
  function viewbills(event) {
    var id  = $(event).data("id");
    alert (id);
     let _url = `/viewbi/${id}/`;
    
       $.ajax({
         url: _url,
        type: "POST",       
         data: {
          "_token": "{{ csrf_token() }}",
        },
        success: function(response) {
               alert(response.bill_date);    
            // if(response.code == 200) {
               $('#bill_print').modal('show');
                  var total_sum=0;
                  var amount_sum=0;
                  var discount_sum=0;
                 jQuery.each( response.ps_arry, function( i, val ) {
                  total_sum+=parseInt(val.total);
                  amount_sum+=parseInt(val.amount);
                  discount_sum+=parseInt(val.discount);
                  
                 if(i>0){

                $('#bill_print_list').prepend('<tr id="row_'+val.id+'"><td>'+val.date+'</td><td>'+val.service_name+'</td><td>'+val.quantity+'</td><td>'+val.amount+'</td><td>'+val.discount+'</td><td>'+val.total+'</td></tr>');
                
                 }
                 
               });

                   $('#bill_print_list').append('<tr><th colspan="5">Total</th><td>'+total_sum+'</td></tr>');

                    $('#am_to').html(amount_sum);
                    $('#dis_to').html(discount_sum);
                    $('#pay_to').html(total_sum);
                    $('#bil_date').html(response.bill_date);
                    $('#bill_id').html(response.bill_id);
                   
                  
                                   
                    $('#bill_print').on('hidden.bs.modal', function () {
                    $("#bill_print_list tbody").empty();
                     // $("#bill_print_list").empty()
              });
           

            // }
        },
        // error: function(response) {
          // $('#advice_group_name_error').text(response.responseJSON.errors.advice_group_name);
          // $('#advice_error').text(response.responseJSON.errors.advice);
          // $('#to_time_error').text(response.responseJSON.errors.to);
        // }
      });
  }


  function deletebills_id(event) {
    // alert('deletePost');
    var id  = $(event).data("id");
     let _url = `/deletebi/${id}`;
      
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



// Endbills

function add_ps(){
  
  var checked = []
        $("input[name='options[]']:checked").each(function ()
{
    checked.push(parseInt($(this).val()));

});  

        let _url  = '{{ url('ps_status_pay') }}';
       $.ajax({
         url: _url,
        type: "POST",       
         data:{
          "res":checked,
          "_token": "{{ csrf_token() }}",
         },
        success: function(response) {
          alert('hello');
          $('#ps_amount_status').val(response.ps_id);
          $('#pay_amount').val(response.amt);
          }
        });
}


function psc(){

var isChecked = $(".ps").is(":checked");
            if (isChecked) {
                  $('#save_value').show();
            } else {
                $('#save_value').hide();
           }
  
}




 
 </script>

 

 @endsection