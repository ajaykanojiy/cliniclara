
@extends('admin.comman.master1')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Login Create Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{url('login_create')}}">
                  @csrf
                  
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"  name="name" value="" placeholder="Enter Name">
                    @error('name') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                  <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" class="form-control" id="number" name="number" value="" placeholder="number">
                    @if ($errors->has('number')) <p style="color:red;">{{ $errors->first('number') }}</p> @endif
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="number" name="email" value="" placeholder="email">
                  </div>

                    <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="password">
                    @error('password') <p style="color:green">{{$message}}</p>@enderror
                  </div>


                   <div class="form-group">
                    <label for="exampleInputPassword1">Type</label>                   
                    <select class="form-control" name="type" id="type">
                      <option value="1">Super Admin</option>
                      <option value="2">Admin</option>
                      <option value="3">Dcotor</option>
                      <option value="4">Employee</option>
                    </select>
                    @error('type') <p style="color:green">{{$message}}</p>@enderror
                  </div>
                  

                   <div class="form-group">
                    <label for="status">Status</label>                  
                    <select class="form-control" name="status" id="status">
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>                      
                    </select>
                  </div>

                  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    @endsection
    <!-- </div> -->