 @extends('admin.comman.master1')
 @section('content')

 @section('title', 'Create List')
  
      <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <a href="{{url('patient/create')}}" class="btn btn-primary ">Create</a>
            </div>
            <!-- /.card-header -->
          <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Type</th>
                  <th>Name</th>
                  <th>Number</th>
                  <th>time</th>
                  <th>Status</th>
                  <th>Action</th>                 
                </tr>
                </thead>
                <tbody>

                  @php $no=1;
                    $ty="";
                   @endphp 
                  @foreach($list as $list)

                 @php if($list->type==1){
                  $ty='Walk';
                }
                  else($list->type==2){
                   $ty='Telephonic'
                  }
                  @endphp
                  
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{ $ty }}</td>
                  <td> {{$list->name.'-'.$list->age}}-{{($list->sex==1)?'Male':'Female'}} </td>
                  <td>{{$list->phone}}</td>
                  <td>{{date('h:i:s',strtotime($list->created_at))}}</td>
                  <td><a href="{{url('profile',$list->id)}}" ><ion-icon name="ellipsis-horizontal-circle-outline"></ion-icon>billung</a></td>

                  <td>
                  <select class="form-control change" name="status"  id="status_" onclick="//statuschange(this.id);">
                    <option value="" >Select</option>  
                   <option value="1_<?php echo $list->id;  ?>"<?php if($list->status==1){echo 'selected';} ?>>In queue</option>
                   <option value="2_<?php echo $list->id;  ?>"<?php if($list->status==2){echo 'selected';} ?>>With Doc </option>
                   <option value="3_<?php echo $list->id;  ?>"<?php if($list->status==3){echo 'selected';} ?>>Checked out </option>
                   <option  value="4_<?php echo $list->id;  ?>"<?php if($list->status==4){echo 'selected';} ?>>Now Show</option>
                   <option style="<?php //echo $show; ?>" value="5_<?php echo $list->id;  ?>"<?php if($list->status==5){echo 'selected';} ?>>Refund</option>
                   <option value="6_<?php echo $list->id;  ?>"<?php if($list->status==6){echo 'selected';} ?>>Emergency</option>
                  </select>
                 </td>
                  
                  <!-- <td><img src="{{asset('storage/avatars/'.$list->image)}}" height="50px"></td> -->
                  <!-- <td><img src="/storage/avatars/{{ $list->image }}"></td> -->
                  <!-- <td><img src="{{Storage::url('$list->image')}}"></td> -->
                                 
                  <td><a href="{{url('patient/'.$list->id.'/edit')}}" class="btn btn-primary ">Edit</a>
                    
                    <form method="post" action="{{url('patient',$list->id)}}">
                       
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

  @section('script')
    <script type="text/javascript">
            $(document).ready(function () {        

              $(".change").change(function(){
                var key=$(this).val();
               
               var res=key.split('_');

               // alert(res);
               var status=res[0];
               var id=res[1];

               // alert(id);          
    
              $.ajax({
            type: "POST",
            url: "/change_status",
            data:{id:id,status:status,
          "_token": "{{ csrf_token() }}",
            
            },
            // contentType: "application/json; charset=utf-8",
            // dataType: "json",
            success: function(result){
                alert(result);
                console.log(result);

                if(result){
          
                  }
            location.reload();
        }
        });
         });

               $("#mytable1").dataTable();
               $("#mytable2").dataTable();

            });

  </script>
  @endsection