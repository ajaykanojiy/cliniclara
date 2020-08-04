@extends('admin.comman.master1')
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
                <div class="col-md-3">
                  <li class="list-group-item">
                    <b>Balance:</b> <a class="float-right">1,322</a>
                  </li>
                </div>

                <div class="col-md-3">
                  <li class="list-group-item">
                    <b>Total Services:</b> <a class="float-right">1,322</a>
                  </li>
                </div>

                <div class="col-md-3">
                  <li class="list-group-item">
                    <b>Total Received:</b> <a class="float-right">1,322</a>
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
                    <!-- The timeline -->
                    
                  </div>
                  <!-- /.tab-pane -->

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
                </div>
                <!-- /.tab-content -->
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