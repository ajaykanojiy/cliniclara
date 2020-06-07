
@extends('admin.comman.master1')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              {{--$login--}}
              <form role="form" method="post" action="{{url('login_create',$login->id)}}">
                  @csrf
                  @method('PATCH') 
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"  name="name" value="{{$login->name}}" placeholder="Enter Name">
                    @error('name') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                  <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" class="form-control" id="number" name="number" value="{{$login->number}}" placeholder="number">
                    @if ($errors->has('number')) <p style="color:red;">{{ $errors->first('number') }}</p> @endif
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="number" name="email" value="{{$login->email}}" placeholder="email">
                  </div>

                    <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="{{$login->password}}" placeholder="password">
                    @error('password') <p style="color:green">{{$message}}</p>@enderror
                  </div>


                   <div class="form-group">
                    <label for="exampleInputPassword1">Type</label>                   
                    <select class="form-control" name="type" id="type">
                      <option value="1"@php if($login->type==1){echo 'selected';}@endphp>Super Admin</option>
                      <option value="2"@php if($login->type==2){echo 'selected';}@endphp>Admin</option>
                      <option value="3"@php if($login->type==3){echo 'selected';}@endphp>Dcotor</option>
                      <option value="4"@php if($login->type==4){echo 'selected';}@endphp>Employee</option>
                    </select>
                    @error('type') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                  

                   <div class="form-group">
                    <label for="status">Status</label>                  
                    <select class="form-control" name="status" id="status">
                      <option value="1"@php if($login->status==1){echo 'selected';}@endphp>Active</option>
                      <option value="2"@php if($login->status==2){echo 'selected';}@endphp>Inactive</option>                      
                    </select>
                  </div>

                  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    @endsection
    <!-- </div> -->