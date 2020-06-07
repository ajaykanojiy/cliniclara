<?php

namespace App\Http\Controllers;

use App\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor=DB::table('doctors')->where('status',1)->get();
        $test_group=DB::table('test_group')->where('status',1)->get();
        $medi_group=DB::table('medi_group')->where('status',1)->get();
        $advice_group=DB::table('advice_group')->where('status',1)->get();
        $diet_group=DB::table('diet_group')->where('status',1)->get();
        $medicines=DB::table('medicines')->where('status',1)->get();
        $medi_time=DB::table('medi_time')->where('status',1)->get();
        $medi_info=DB::table('medi_info')->where('status',1)->get();
        // print_r($doctor);die;
 return view('prescription/view',compact('doctor','test_group','medi_group','advice_group','diet_group','medicines','medi_time','medi_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
          'medi_name'  => 'required',
          'medi_when'  => 'required',
    
        ]);
           $type=$request->session()->get('sess')['type'];
           if($type==3){
             $log_id=$request->session()->get('sess')['log'];
           }else{
            $log_id=0;
           }

            
         if ( !empty ( $request->doctor_id ) ) {
            $log= $request->doctor_id;
          }
          else{
           $log=$log_id;
          }
       
         $data=array(
          
             'medi_name'=>$request->medi_name,
              'medi_when'=>$request->medi_when,
              'medi_freq'=>$request->medi_freq,
              'medi_dur'=>$request->medi_dur,
              'medi_days'=>$request->medi_days,
              'medi_instr'=>$request->medi_instr,
              'medi_alter'=>$request->medi_alter,
    
         );
         // dd($data);
           
           if($request->medi_info_id){
            DB::table('medi_info')->where('id',$request->medi_info_id)->update($data);

            $id=$request->medi_info_id;
           }else{
            $data['log_id']=$log;
           $res= DB::table('medi_info')->insertGetId($data);
           $id=$res;
           }
         
    
         $data1=DB::table('medi_info')->find($id);

          if($data1->medi_freq==1){
                  $fre='Daily';
                }

                 elseif($data1->medi_freq==2){
                  $fre='Weekly';
                }

                elseif($data1->medi_freq==3){
                  $fre='Monthly';
                } 
                

                if($data1->medi_days==1){
                    $day='Days';
                }

                elseif($data1->medi_days==2){
                    $day='week';
                }

                elseif($data1->medi_days==3){
                    $day='Month';
                }

                if($data1->medi_instr==1){
                    $medi_instr='With food';
                }

                elseif($data1->medi_instr==2){
                    $medi_instr='Before Food';
                }

                elseif($data1->medi_instr==3){
                    $medi_instr='After Food';
                }

        $medi_name=DB::table('medicines')->find($data1->medi_name);   
        $medi_when=DB::table('medi_time')->find($data1->medi_when); 
        

        $data=array(
            'id'=>$data1->id,
         'medi_name'=>$medi_name->name,
         'medi_when'=>$medi_when->name,
         'medi_freq'=>$fre,
         'medi_dur'=>$data1->medi_dur,
         'medi_days'=>$day,
         'medi_instr'=>$medi_instr,
        );
        

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $data], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $row=DB::table('medi_info')->find($id);
       return response()->json($row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $res= DB::table('medi_info')->delete($id);
         return response()->json(['success'=>'Post Deleted successfully']); 
    }

// test_group

                public function test_group_store(Request $request){

                $request->validate([
                  'group_name'       => 'required',
                  'test'       => 'required',
            
                ]);
                   $type=$request->session()->get('sess')['type'];
                   if($type==3){
                     $log_id=$request->session()->get('sess')['log'];
                   }else{
                    $log_id=0;
                   }

                    
                 if ( !empty ( $request->doctor_id ) ) {
                    $log= $request->doctor_id;
                  }
                  else{
                   $log=$log_id;
                  }
               
                   
                   if($request->test_group_id){
                    DB::table('test_group')->where('id',$request->test_group_id)->update(
                        ['group_name'=>$request->group_name,
                         'test'=>$request->test,
                    ]);

                    $id=$request->test_group_id;
                   }else{
                   $res= DB::table('test_group')->insertGetId([
                      'log_id'=>$log,
                      'group_name'=>$request->group_name,
                      'test'=>$request->test,
                    ]);
                   $id=$res;
                   }
                 

            
                 $row=DB::table('test_group')->find($id);

                return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $row], 200);


                    }

            public function test_group_edit($id){
              $row=DB::table('test_group')->find($id);
               return response()->json($row);
              // print_r($row);
            }

            public function test_group_del($id){
               $res= DB::table('test_group')->delete($id);


              return response()->json(['success'=>'Post Deleted successfully']);  
            }


// medi_group

    public function medi_group_store(Request $request){

        $request->validate([
          'medi_group_name'  => 'required',
          'medicines'       => 'required',
    
        ]);
           $type=$request->session()->get('sess')['type'];
           if($type==3){
             $log_id=$request->session()->get('sess')['log'];
           }else{
            $log_id=0;
           }

            
         if ( !empty ( $request->doctor_id ) ) {
            $log= $request->doctor_id;
          }
          else{
           $log=$log_id;
          }
       
           
           if($request->test_group_id){
            DB::table('medi_group')->where('id',$request->medi_group_id)->update(
                ['medi_group_name'=>$request->medi_group_name,
                 'medicines'=>$request->medicines,
            ]);

            $id=$request->test_group_id;
           }else{
           $res= DB::table('medi_group')->insertGetId([
              'log_id'=>$log,
              'medi_group_name'=>$request->medi_group_name,
              'medicines'=>$request->medicines,
            ]);
           $id=$res;
           }
         

    
         $row=DB::table('medi_group')->find($id);

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $row], 200);


    }

    public function medi_group_edit($id){
      $row=DB::table('medi_group')->find($id);
       return response()->json($row);
      // print_r($row);
    }

    public function medi_group_del($id){
       $res= DB::table('medi_group')->delete($id);


      return response()->json(['success'=>'Post Deleted successfully']);  


    }



// Advise group_name


        public function advice_group_store(Request $request){

        $request->validate([
          'advice_group_name'  => 'required',
          'advice'       => 'required',
    
        ]);
           $type=$request->session()->get('sess')['type'];
           if($type==3){
             $log_id=$request->session()->get('sess')['log'];
           }else{
            $log_id=0;
           }

            
         if ( !empty ( $request->doctor_id ) ) {
            $log= $request->doctor_id;
          }
          else{
           $log=$log_id;
          }
       
           
           if($request->advice_group_id){
            DB::table('advice_group')->where('id',$request->advice_group_id)->update(
                ['advice_group_name'=>$request->advice_group_name,
                 'advice'=>$request->advice,
            ]);

            $id=$request->advice_group_id;
           }else{
           $res= DB::table('advice_group')->insertGetId([
              'log_id'=>$log,
              'advice_group_name'=>$request->advice_group_name,
              'advice'=>$request->advice,
            ]);
           $id=$res;
           }
         

    
         $row=DB::table('advice_group')->find($id);

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $row], 200);


    }

    public function advice_group_edit($id){
      $row=DB::table('advice_group')->find($id);
       return response()->json($row);
      // print_r($row);
    }

    public function advice_group_del($id){
       $res= DB::table('advice_group')->delete($id);


      return response()->json(['success'=>'Post Deleted successfully']);  
    }


  
  //Diet Groups


 public function diet_group_store(Request $request){

        $request->validate([
          'diet_group_name'  => 'required',
          'diet'       => 'required',
    
        ]);
           $type=$request->session()->get('sess')['type'];
           if($type==3){
             $log_id=$request->session()->get('sess')['log'];
           }else{
            $log_id=0;
           }

            
         if ( !empty ( $request->doctor_id ) ) {
            $log= $request->doctor_id;
          }
          else{
           $log=$log_id;
          }
       
           
           if($request->diet_group_id){
            DB::table('diet_group')->where('id',$request->diet_group_id)->update(
                ['diet_group_name'=>$request->diet_group_name,
                 'diet'=>$request->diet,
            ]);

            $id=$request->diet_group_id;
           }else{
           $res= DB::table('diet_group')->insertGetId([
              'log_id'=>$log,
              'diet_group_name'=>$request->diet_group_name,
              'diet'=>$request->diet,
            ]);
           $id=$res;
           }
         

    
         $row=DB::table('diet_group')->find($id);

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $row], 200);


    }

    public function diet_group_edit($id){
      $row=DB::table('diet_group')->find($id);
       return response()->json($row);
      // print_r($row);
    }

    public function diet_group_del($id){
       $res= DB::table('diet_group')->delete($id);


      return response()->json(['success'=>'Post Deleted successfully']);  
    }



}
