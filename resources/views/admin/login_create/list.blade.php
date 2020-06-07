 @extends('admin.comman.master1')
 @section('content')
 <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
  
    
     <div class="panel panel-success">
  <div class="panel-heading">Login List
    
    <a href="{{url('login_create/create')}}"  class="btn btn-primary pull-right owtbtn">Create new</a>
  </div>
  <div class="panel-body">

      <div class="row">
        <div class="col-xs-12">
        
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Number</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                  @php 
                  $no=1;
                  $ty="";
                  @endphp
                   @foreach($list as $list)

                   @if($list->type==1)
                   @php($ty='Super Admin')
                   @elseif($list->type==2)
                   @php($ty='Admin')
                   @elseif($list->type==3)
                   @php($ty='Doctor')
                   @elseif($list->type==4)
                   @php($ty='Employee')
                   @endif
                <tr>
                  <td>{{$no++}}</td>
                  <td>  {{$list->name}}</td>
                  <td>{{$list->number}}</td>
                  <td>{{$list->email}}</td>
                  <td>{{$list->password}}</td>
                  <td>{{$ty}}</td>
                  <td>{{$list->status}}</td>
                 
                             
                  <td> <a href="{{url('login_create/'.$list->id.'/edit')}}" class="btn btn-primary">Edit</a></td>
                  <td><form action="{{url('login_create',$list->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form></td>
                </tr>
                @endforeach
               
                </tbody>
              </table>
            </div>
          
        </div>
       </div>
     
  </div>
</div>
  @endsection