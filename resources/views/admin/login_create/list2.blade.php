   @extends('admin.comman.master1')
@section('content')



    <!-- Content Header (Page header) -->
   



<div class="panel panel-success">
 
     <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
              
            </div>
            <div class="col-md-4 text-center">
                @if (Session::has('success'))
              <span class="alert-danger">{{ Session::get('success') }}</span>
               @endif

            </div>
            <div class="col-md-4 text-right">
              <a href="{{url('login_create/create')}}"  class="btn btn-primary pull-right owtbtn">Create new</a>

           </div>
        </div>

   <div class="card-body">
              
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Number(s)</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>


                <tbody>
                  @php($no=1)
                  @php($ty="")

                  @foreach($list as $list)
                   @if($list->type==1)
                   @php($ty='uperAdmin')

                   @elseif($list->type==2)
                   @php($ty='Admin')

                   @elseif($list->type==3)
                   @php($ty='Doctor')

                  @else
                   @php($ty='Doctor')

                   @endif
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$list->name}}</td>
                  <td>{{$list->number}} </td>
                  <td>{{$list->email}}</td>
                  <td>{{$list->password}}</td>
                  <td>{{$ty}}</td>
                  <td>{{($list)?'Active':'Inactive'}}</td>
                  <td><a href="{{url('login_create/'.$list->id.'/edit')}}" class="btn btn-primary"> Edit</a>
                 |
                 <form action="{{url('login_create',$list->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
  
                  </td>

                
                </tr>
                @endforeach
            </tbody>
                
              </table>
            </div>
  </div>
            <!-- /.card-body -->
          
          @endsection

         @section('script')

        
        
        @endsection