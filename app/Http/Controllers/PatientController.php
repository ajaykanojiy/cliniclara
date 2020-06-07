<?php

namespace App\Http\Controllers;

use App\Patient;
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
}
