<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Login_create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $list=Doctor::all();
        $list=Doctor::orderBy('id', 'DESC')->get();
          
        return view('admin.doctor.list',compact('list'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $schedule = DB::table('schedule')->get();
          $insert_id=""; 

        $insert_id="";
        // $schedule="";
        return view('admin.doctor.view',compact('insert_id','schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
         'name'=>'required',
         'number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
         // 'password'=>'required',
         // 'type'=>'required'
     ]);

      
         $doc=new Doctor();

        $doc->name=$request->name;
        $doc->number=$request->number;
        $doc->email=$request->email;
        $doc->main_educaton=$request->main_educaton;
        $doc->medical_reg_no=$request->medical_reg_no;
        $doc->speciality=$request->speciality;
        $doc->year_of_experience=$request->year_of_experience;
        $doc->patients_per_hour=$request->patients_per_hour;
        $doc->fees=$request->fees;
        $doc->gender=$request->gender;            
        $doc->status=$request->status ;
        // echo '<pre>';
        // print_r($doc);die;
         
         // $path = $request->file('image')->store('avatars','public');
        if($request->hasfile('image')){
         $filename=$request->image->getclientoriginalName();
     
         $request->image->storeAs('avatars',$filename,'public');
         $doc->image=$filename;    
          }
        $id=$doc->save();
        $insert_id=$doc->id;
        if($insert_id){
           $this->login_data($insert_id,$doc);
           $schedule="";
           session()->flash('success','Record save sucsessfully');
           // return view('admin.doctor.view',compact('insert_id','schedule'));
          return redirect()->route('doctor.edit', [$insert_id]);
          

        }

    }


    public function login_data($id,$doc){

         $login=new login_create();
        $login->log_id=$id;
        $login->name=$doc->name;
        $login->number=$doc->number;
        $login->email=$doc->email;
        $login->password=$doc->number;
        $login->type=3;
        $login->status=1;
       

        $id=$login->save();

    }
   





    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $schedule = DB::table('schedule')->get();
        $row=Doctor::find($id);
        $days=explode(',', $row->days) ;
         $insert_id=$row->id; 
           
        return view('admin.doctor.edit',compact('row','days','insert_id','schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
         'name'=>'required',
         'number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
         // 'password'=>'required',
         // 'type'=>'required'
     ]);

       // $days = implode(',',  $request->days);
        // print_r($days);die;
        
         $doc=Doctor::find($id);
        $doc->name=$request->name;
        // $login->name=$request->name;
        $doc->number=$request->number;
        $doc->email=$request->email;
        $doc->main_educaton=$request->main_educaton;
        $doc->medical_reg_no=$request->medical_reg_no;
        $doc->speciality=$request->speciality;
        $doc->year_of_experience=$request->year_of_experience;
        $doc->patients_per_hour=$request->patients_per_hour;
        $doc->fees=$request->fees;
        $doc->gender=$request->gender;
        // $doc->image=$request->image;
        $doc->status=$request->status ;
         if($request->hasfile('image')){

             $filename=$request->image->getclientoriginalName();     
             $request->image->storeAs('avatars',$filename,'public');
         $doc->image=$filename;
         }else{
            $doc->image=$request->hidden_image;
         }

         

          
       

        $id=$doc->save();
        // dd($id);
        if($id){
            session()->flash('success','Record Update sucsessfully');
            return redirect('doctor');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc=Doctor::find($id);
        $doc->delete();
         $res= DB::table('schedule')->delete($id);
         return redirect('login_create')->with('success','record delete successfully');
    }


     public function schedule_index()
    {
         $schedule = DB::table('schedule')->get();
          $insert_id=""; 

        return view('admin/doctor/view', compact('schedule','insert_id'));
    }


     public function schedule_edit($id)
    {
        // echo $id;
         $schedule = DB::table('schedule')->find($id);
         

        return response()->json($schedule);
    }


    public function schedule(Request  $request){

         $request->validate([
          'days'       => 'required',
          'from'       => 'required',
          'to' => 'required',
        ]);

     $id=0;
        $days = implode(',',  $request->days);

       if($request->schedule_id)
       {
        
         $affected = DB::table('schedule')
             ->where('id',$request->schedule_id)
              ->update([
        'doc_id'=>$request->doc_id,
       'days' => $days,
       'from_time' => $request->from, 
       'to_time' => $request->to 
     ]);
      $id=$request->input(('schedule_id'));        
    }else{

      $data=DB::table('schedule')->insertGetId(
        [
        'doc_id'=>$request->doc_id,
       'days' => $days,
       'from_time' => $request->from, 
       'to_time' => $request->to 
   ]);
     $id=$data; 

  }
   $res=Db::table('schedule')->find($id);
    // print_r($res);
     
        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $res], 200);
        
        

    }

    public function schedule_del($id)
    {

        // echo $id;
      // $res= DB::table('schedule_del')->find($id);
      $res= DB::table('schedule')->delete($id);


      return response()->json(['success'=>'Post Deleted successfully']);
    }
}
