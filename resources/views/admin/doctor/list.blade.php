 @extends('admin.comman.master1')
 @section('content')

 @section('title', 'Create List')
  
      <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <a href="{{url('doctor/create')}}" class="btn btn-primary ">Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>name</th>
                  <th>number</th>
                  <th>email</th>
                  <!-- <th>main_educaton</th> -->
                  <!-- <th>medical_reg_no</th> -->
                  <th>fees</th>
                  <th>gender</th> 
                  <th>Image</th> 
                  <th>Action</th>                 
                </tr>
                </thead>
                <tbody>
                  @php $no=1; @endphp 
                  @foreach($list as $list)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$list->name}}</td>
                  <td> {{$list->number}} </td>
                  <td>{{$list->email}}</td>
                  <!-- <td>{{$list->main_educaton}}</td> -->
                  <!-- <td>{{$list->medical_reg_no}}</td> -->
                  <td>{{$list->fees}}</td>
                  <td>{{($list->gender==1)?'Male':'Female'}}</td>
                  <td><img src="{{asset('storage/avatars/'.$list->image)}}" height="50px"></td>
                  <!-- <td><img src="/storage/avatars/{{ $list->image }}"></td> -->
                  <!-- <td><img src="{{Storage::url('$list->image')}}"></td> -->
                                 
                  <td><a href="{{url('doctor/'.$list->id.'/edit')}}" class="btn btn-primary ">Edit</a>
                    
                    <form method="post" action="{{url('doctor',$list->id)}}">
                       
                      @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>

                    </form>
                  </td>
                  
                </tr>
                @endforeach
               
                </tbody>
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  @endsection