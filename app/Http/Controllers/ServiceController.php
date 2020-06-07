<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=Service::all();
        $vital=DB::table('vital')->get();
        $medicines=DB::table('medicines')->get();
        $medi_time=DB::table('medi_time')->get();
        return view('clinic_setting/view', compact('service','vital','medicines','medi_time'));
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
          'name'       => 'required',
          'fees_amount'       => 'required',
    
        ]);


         $post = Service::updateOrCreate(['id' => $request->service_id], [
                  'name' => $request->name,
                  'fees_amount' => $request->fees_amount
                ]);

         // print_r($post);

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $service = Service::find($id);
        return response()->json($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row=Service::find($id);
        $row->delete();
        return response()->json(['success'=>'Post Deleted successfully']);
    }


    // vital


    public function vital_store(Request $request){

        $request->validate([
          'name_vital'       => 'required',
          // 'fees_amount'       => 'required',
    
        ]);
           
           if($request->vital_id){
            DB::table('vital')->where('id',$request->vital_id)->update(
                ['name'=>$request->name_vital]
            );

            $id=$request->vital_id;
           }else{
           $res= DB::table('vital')->insertGetId([
              'name'=>$request->name_vital,
            ]);
           $id=$res;
           }
         

    
         $row=DB::table('vital')->find($id);

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $row], 200);


    }

    public function vital_edit($id){
      $row=DB::table('vital')->find($id);
       return response()->json($row);
      // print_r($row);
    }

    public function vital_del($id){
       $res= DB::table('vital')->delete($id);


      return response()->json(['success'=>'Post Deleted successfully']);  
    }

    // medcines 



       public function medicines_store(Request $request){

        $request->validate([
          'name_medicines'       => 'required',
          // 'fees_amount'       => 'required',
    
        ]);
           
           if($request->medicines_id){
            DB::table('medicines')->where('id',$request->medicines_id)->update(
                ['name'=>$request->name_medicines]
            );

            $id=$request->medicines_id;
           }else{
           $res= DB::table('medicines')->insertGetId([
              'name'=>$request->name_medicines,
            ]);
           $id=$res;
           }
         

    
         $row=DB::table('medicines')->find($id);

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $row], 200);


    }

    public function medicines_edit($id){
      $row=DB::table('medicines')->find($id);
       return response()->json($row);
      // print_r($row);
    }

    public function medicines_del($id){
       $res= DB::table('medicines')->delete($id);


      return response()->json(['success'=>'Post Deleted successfully']);  
    }


     // Medi_time



        public function medi_time_store(Request $request){

        $request->validate([
          'name_medi_time'       => 'required',
          // 'fees_amount'       => 'required',
    
        ]);
           
           if($request->medi_time_id){
            DB::table('medi_time')->where('id',$request->medi_time_id)->update(
                ['name'=>$request->name_medi_time]
            );

            $id=$request->medi_time_id;
           }else{
           $res= DB::table('medi_time')->insertGetId([
              'name'=>$request->name_medi_time,
            ]);
           $id=$res;
           }
         

    
         $row=DB::table('medi_time')->find($id);

        return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $row], 200);


    }

    public function medi_time_edit($id){
      $row=DB::table('medi_time')->find($id);
       return response()->json($row);
      // print_r($row);
    }

    public function medi_time_del($id){
       $res= DB::table('medi_time')->delete($id);


      return response()->json(['success'=>'Post Deleted successfully']);  
    }
}
