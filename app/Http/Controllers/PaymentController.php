<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // print_r($request->ps_amount_status);die;
        $request->validate([
          'pay_amount'  => 'required',
          'pay_mode'    => 'required',
    
        ]);
           $type=$request->session()->get('sess')['type'];
           // if($type==3){
             $log_id=$request->session()->get('sess')['log'];
           // }else{
            // $log_id=0;
           // }
           
           if($request->payments_id){
            DB::table('payments')->where('id',$request->payments_id)->update(
                [
                 'log_id'=>$log_id,
                 'patient_id'=>$request->patient_id,
                 'date'=>date('Y-m-d',strtotime($request->pay_date)),
                 'amount'=>$request->pay_amount,
                 'pay_mode'=>$request->pay_mode,
                 
            ]);

            $id=$request->payments_id;
           }else{
           $res= DB::table('payments')->insertGetId([
                 'log_id'=>$log_id,
                 'patient_id'=>$request->patient_id,
                  'date'=>date('Y-m-d',strtotime($request->pay_date)),
                 'amount'=>$request->pay_amount,
                 'pay_mode'=>$request->pay_mode,
            ]);
           $id=$res;
           $ps_amount_status=explode(',', $request->ps_amount_status);
           foreach ($ps_amount_status as $key => $value) {
               
          DB::table('p_services')->where('id',$value)->update([
           'amount_status'=>2
        ]);
           }
           }

         $row=DB::table('payments')->find($id);

              if($row->pay_mode==1){
                $mode='Cash';
              }
               elseif($row->pay_mode==2){
                $mode='Card';
              }
              elseif($row->pay_mode==3){
                $mode='Online';
              }
              else{

                $mode='Other';
              }

              $data=array(
              'date'=>$row->date,
              'amount'=>$row->amount,
              'pay_mode'=>$mode,
              'id'=>$row->id,
              );

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $data], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row=DB::table('payments')->find($id);
        return response()->json($row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res= DB::table('payments')->delete($id);


      return response()->json(['success'=>'Post Deleted successfully']);  
    }
}
