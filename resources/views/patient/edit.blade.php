
@extends('admin.comman.master1')
@section('content')
@section('title','Patient Form')
@section('stylesheet')

  <link rel="stylesheet" href="{{asset('admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
<!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Login Create Form</h3>
              </div>
            </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('patient')}}" enctype= multipart/form-data>
                  @csrf
                  <div class="card-body">
                <div class="row" style="margin-top: 20px;">
                  <div class="col-md-6">
                    <select class="form-control" name="type" id="type">
                      <option value="1"<?php if($row->type==1){echo 'selected';} ?>>Walk In</option>
                      <option value="2"@php if($row->type==2){ echo 'selected';} @endphp>Telephonic</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                  <input type="text" name="date" id="date" value="@php if($row->date){echo date('d-m-Y',strtotime($row->date));}else{ echo date('d-m-Y') ;} @endphp " class="form-control">
                </div>
                </div>


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
                     <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$row->phone}}" data-inputmask='"mask": "9999999999"'  data-mask>
                  </div>
                   
                    @if ($errors->has('phone')) <p style="color:red;">{{ $errors->first('phone') }}</p> @endif
                  </div>
                 </div>
                  
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $row->email }}" placeholder="email">
                     @error('email') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
              </div>


              <div class="row">
                  <div class="col-md-4">
                   <div class="form-group">
                    <label for="name">sex</label>
                   <select class=" form-control" name="sex" id="sex">
                     <option value="1" @php if($row->sex==1){echo 'selected';} @endphp>Male</option>
                     <option value="2" @php if($row->sex==2){echo 'selected';} @endphp>Female</option>
                     <option value="3" @php if($row->sex==3){echo 'selected';} @endphp>Other</option>
                   </select>
                    @error('sex') <p style="color:green">{{$message}}</p>@enderror
                   </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="dob">dob</label>
                   <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="dob" name="dob" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" value="{{ $row->dob}}" im-insert="false" onchange="getAge();">
                  </div>
                   
                    @if ($errors->has('dob')) <p style="color:red;">{{ $errors->first('dob') }}</p> @endif
                  </div>
                 </div>
                  
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">age</label>
                    <input type="text" class="form-control" id="age" name="age" value="{{$row->age}}" placeholder="age">
                     @error('age') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                </div>
              </div>


                <div class="row">
                  <div class="col-md-4">
                   <div class="form-group">
                    <label for="name">address</label>
                    <input type="text" class="form-control" id="address"  name="address" value="{{$row->address}}" placeholder="Enter address">
                    @error('address') <p style="color:green">{{$message}}</p>@enderror
                   </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="city">city</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{$row->city}}" placeholder="city">
                    @if ($errors->has('city')) <p style="color:red;">{{ $errors->first('city') }}</p> @endif
                  </div>
                 </div>
                  
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">pincode</label>
                    <input type="number" class="form-control" id="pincode" name="pincode" value="{{$row->pincode}}" placeholder="pincode">
                  </div>
                </div>
              </div> 


              <div class="row">
                  <div class="col-md-4">
                   <div class="form-group">
                    <label for="name">id_type</label>
                    <select class="form-control" name="id_type" id="id_type">
                      <option value="1"@php if($row->id_type==1){echo 'selected';} @endphp>id1</option>
                      <option value="2"@php if($row->id_type==2){echo 'selected';} @endphp>id2</option>
                      <option value="3"@php if($row->id_type==3){echo 'selected';} @endphp>id3</option>
                    </select>
                    @error('id_type') <p style="color:green">{{$message}}</p>@enderror
                   </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="id_number">id_number</label>
                    <input type="text" class="form-control" id="id_number" name="id_number" value="{{$row->id_number}}" placeholder="id_number">
                    @if ($errors->has('id_number')) <p style="color:red;">{{ $errors->first('id_number') }}</p> @endif
                  </div>
                 </div>
                  
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="" placeholder="image">
                    <input type="hidden" class="form-control" id="image_update" name="image_update" value="{{$row->image}}" placeholder="image">
                  </div>
                </div>
              </div> 


              <div class="row">
                  <div class="col-md-4">
                   <div class="form-group">
                    <label for="doctor">Doctor</label>
                    <select class="form-control" name="doctor" id="doctor">
                      <option value="">Select Doctor</option>
                      @foreach($doctor as $doctor )
                      <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                      @endforeach
                    </select>
                    @error('doctor') <p style="color:green">{{$message}}</p>@enderror
                   </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="service">service</label>
                    <select class="form-control" name="service" id="service">
                      <option value="">Select Service</option>
                      @foreach($service as $service )
                      <option value="{{$service->id}}"@php if($row->service==$service->id){echo 'selected';} @endphp >{{$service->name}}</option>
                      @endforeach
                    </select>
                    @error('service') <p style="color:green">{{$message}}</p>@enderror
                   </div>
                 </div>
                  
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fees">Fees</label>
                    <input type="text" class="form-control" id="fees" name="fees" value="{{$row->fees}}" placeholder="fees">
                  </div>
                </div>
              </div>  
 

              


                  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            <!-- </div> -->
    @endsection
    <!-- </div> -->
    @section('script')
<script src="{{asset('admin/')}}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('admin/')}}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript">
        $(function () {
   
    
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });    
    $('[data-mask]').inputmask()

     });

        function getAge() {
      var da=$('#dob').val(); 
    

    var userDate = da;
      var from = userDate.split("/");       
        var f = new Date(from[2], from[1], from[0]);
        var date_string = f.getFullYear() + " " + f.getMonth() + " " + f.getDate();
        console.log(date_string);
      dob = new Date(date_string);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));   
       
       alert(age);
  
    $('#age').val(age);
    
}
    </script>

    @endsection