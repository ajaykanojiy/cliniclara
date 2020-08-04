<?php

namespace App\Http\Controllers;

use App\P_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=P_service::all();
        return view('patient.profile',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
          'service_name'=> 'required',
          'amount'       => 'required',
    
        ]);
           $type=$request->session()->get('sess')['type'];
           // if($type==3){
             $log_id=$request->session()->get('sess')['log'];
           // }else{
            // $log_id=0;
           // }

            
         // if ( !empty ( $request->doctor_id ) ) {
         //    $log= $request->doctor_id;
         //  }
         //  else{
         //   $log=$log_id;
         //  }
                 if($request->quantity>0){
               $am=$request->quantity * $request->amount; 
               }else{
                $am=$request->amount; 
               } 
                 if($request->discount){
                    $amu= $am-$request->discount ;
                 }else{
                   $amu=$am; 
                 }   
           
           if($request->p_services_id){
            DB::table('p_services')->where('id',$request->p_services_id)->update(
                [
                // 'patinet_id'=>$request->patinet_id,
                //  'log_id'=>$request->advice,
                 'date'=>$request->date,
                 'service_name'=>$request->service_name,
                 'quantity'=>$request->quantity,
                 'amount'=>$am,
                 'discount'=>$request->discount,
                 'total'=>$amu,
            ]);

            $id=$request->p_services_id;
           }else{

            
                 
           $res= DB::table('p_services')->insertGetId([
                 'patinet_id'=>$request->patinet_id,
                 'log_id'=>$log_id,
                 // 'log_id'=>$request->advice,
                 'date'=>date('Y-m-d',strtotime($request->date)),
                 'service_name'=>$request->service_name,
                 'quantity'=>$request->quantity,
                 'amount'=>$am,
                 'discount'=>$request->discount,
                 'total'=>$amu,
            ]);
            
           $id=$res;
           }
         

    
         $row=DB::table('p_services')->find($id);
         $service=DB::table('services')->find($row->service_name);
         $data=array(

         'id'=>$row->id,
         'date'=>$row->date,
         'service_name'=>$service->name,
         'quantity'=>$row->quantity,
         'amount'=>$row->amount,
         'bill_status'=>$row->bill_status,
         'amount_status'=>$row->amount_status,

          );

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $data], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\P_service  $p_service
     * @return \Illuminate\Http\Response
     */
    public function show(P_service $p_service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\P_service  $p_service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $row=DB::table('p_services')->find($id);
       return response()->json($row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\P_service  $p_service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, P_service $p_service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\P_service  $p_service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }


  public function get_amount(Request $request ){
   
    $row=DB::table('services')->find($request->id);
     return response()->json($row);
  }
}
