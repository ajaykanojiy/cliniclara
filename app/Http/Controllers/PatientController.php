<?php

namespace App\Http\Controllers;

use App\Patient;
use App\P_service;
use App\Payment;
use App\bill;
use Illuminate\Http\Request;
use App\Doctor;
use App\Service;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $lists=Patient::all();
        return view('patient.de',compact('lists'));
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $day_of_week = date('N', strtotime('7-05-2020'));
        //  echo $day_of_week;die;
     $doctor=Doctor::all();
     $service=Service::all();
      
     return view('patient.view',compact('doctor','service'));
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
          'date'=>'required',
          'type'=>'required',
          'name'=>'required',
          'phone'=>'required',
          'email'=>'required',
          'sex'=>'required',
          'dob'=>'required',
          'doctor'=>'required',
          'service'=>'required',
          'fees'=>'required',
    
        ]);

         $log=$request->session()->get('sess')['log'];

         $patient=new Patient();
         $patient->log_id=$log;  
        $patient->date = date('Y-m-d',strtotime($request->date));
        
        $patient->type = $request->type;
    
        $patient->name = $request->name;
        $patient->phone = $request->phone;
        $patient->sex = $request->sex;
        $patient->dob = date('Y-m-d',strtotime($request->dob));
        $patient->age = $request->age;
        $patient->address = $request->address;
        $patient->city = $request->city;
        $patient->pincode = $request->pincode;
        $patient->id_type = $request->id_type;
        $patient->id_number = $request->id_number;
        $patient->doctor = $request->doctor;
        $patient->service = $request->service;
        $patient->fees = $request->fees;

                if($request->hasfile('image')){
         $filename=$request->image->getclientoriginalName();
          // dd($filename);
         $request->image->storeAs('avatars',$filename,'public');
         $patient->image=$filename;  
         // dd($patient);  
          }
         
      
          $id=$patient->save();
         // session()->flash('success','Record update sucsessfully');
            return redirect('patient/create')->with('success','record insert sucsessfully');;   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor=Doctor::all();
        $service=Service::all();
        $row=Patient::find($id);
        // print_r($row);
        return view('patient/edit',compact('doctor','service','row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function change_status(request $request){
      //   $id= $request->id;
      // $status= $request->status;

       DB::table('patients')->where('id',$request->id)->update(
                ['status'=>$request->status ]
            );

      
    }
    public function profile($id){
        // echo $id;die;
        $patient_id=$id;
        $row=Patient::find($id);
         $lists=P_service::orderBy('id','DESC')->get();
         $pay=Payment::all();
         $ser=Service::all();
         $bill=bill::all();
        return view('patient.profile',compact('row','lists','ser','patient_id','pay','bill'));
    }


    public function bill(Request $request){
       
     $id=$request->ser_check;
     // print_r($id);
     $amt=0;
     $service[]="";
     $ps_data[]="";
     foreach ($id as $key => $value) {
         $result = DB::table('p_services')->where('id',$value)->first();

           $amt+=$result->amount;

           $service[]=DB::table('services')->where('id',$result->service_name)->value('name');
        
           $this->change_status_ps($value);
           $ps_data[]=$result;
           
     }

       $bill_date= date('Y-m-d');
        $log=$request->session()->get('sess')['log'];
           $res= DB::table('bills')->insertGetId([
                'log_id'=>$log,
                'patient_id'=>$request->cus_id,
                'date'=>$bill_date,
                'ps_service_id'=>implode(',', $id),
                'service_name'=>implode(',', $service),
                'amount'=>$amt,
            ]);
           $bill_id=$res;
           
          $row=DB::table('bills')->find($bill_id);
          // $this->print_bill($id); 
              
        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $row,'ps_arry'=>$ps_data,'bill_date'=>$bill_date,'bill_id'=>$bill_id], 200);

     }
    
    public function print_bill($id){
        $result = DB::table('p_services')->where('id',$id)->first(); 
        return view('patient/print_bill');
    }



    public function change_status_ps($id){

        DB::table('p_services')->where('id',$id)->update([
         'bill_status'=>2
        ]);
    }


    public function ps_status_pay(Request $request){
        $amt=0;
     foreach ($request->res as $key => $value) {
         
         $result = DB::table('p_services')->where('id',$value)->first();

           $amt+=$result->total;

         
     }

     return response()->json(['amt'=>$amt, 'ps_id'=>$request->res]);
    }


    public function viewbills_get($id){
        $ps_data[]="";
       $row=DB::table('bills')->find($id);
         $bill_date=$row->date;
         $bill_id=$id;
       $ps_id= $row->ps_service_id;
         $p_id=explode(',', $ps_id);
        foreach ($p_id as $key => $value) {
         $result = DB::table('p_services')->where('id',$value)->first();        
           
           $ps_data[]=$result;                   
     }

     return response()->json(['code'=>200,'ps_arry'=>$ps_data ,'bill_date'=>$bill_date,'bill_id'=>$bill_id], 200,);
    }


    public function delete_bill ($id){

       $row=DB::table('bills')->find($id);
       $ps_id= $row->ps_service_id;
         $p_id=explode(',', $ps_id);
        foreach ($p_id as $key => $value) {
          DB::table('p_services')->where('id',$value)->update([
         'bill_status'=>1
        ]);
        }
        $res= DB::table('bills')->delete($id);
        // $row->delete();
         
          return response()->json(['code'=>200]);
         // return redirect('login_create')->with('success','record delete successfully');
    
}


}


 