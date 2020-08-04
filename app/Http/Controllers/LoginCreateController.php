<?php

namespace App\Http\Controllers;

use App\Login_create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
         $list=Login_create::all();
          
        return view('admin.login_create.list2',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.login_create.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->input('name');   //get filed value Using the properties of Request input method()
       // return $request->name;      //get filed value Using the properties of Request instance
        $this->validate($request,[
         'name'=>'required',
         'number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
         'password'=>'required',
         'type'=>'required']);

      
        $login=new login_create();
        $login->name=$request->name;
        // $login->name=$request->name;
        $login->number=$request->number;
        $login->email=$request->email;
        $login->password=$request->password;
        $login->type=$request->type;
        $login->status=$request->status;
       

        $id=$login->save();
        // dd($id);
        if($id){
            session()->flash('success','Record save sucsessfully');
            return redirect('login_create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Login_create  $login_create
     * @return \Illuminate\Http\Response
     */
    public function show(Login_create $login_create)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Login_create  $login_create
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
         $login=Login_create::find($id);
          // print_r($login);
        
       return view('admin.login_create.edit',compact('login'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Login_create  $login_create
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
         'name'=>'required',
         'number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
         'password'=>'required',
         'type'=>'required']);

      
       $login=Login_create::find($id);
        $login->name=$request->name;
        $login->number=$request->number;
        $login->email=$request->email;
        $login->password=$request->password;
        $login->type=$request->type;
        $login->status=$request->status;
       

        $id=$login->save();
       
        if($id){
            session()->flash('success','Record update sucsessfully');
            return redirect('login_create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Login_create  $login_create
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $login=Login_create::find($id);
        $login->delete();
         return redirect('login_create')->with('success','record delete successfully');
    }





    public function admin_login(Request $request)
    {
          
        $num = $request->number;  

         $password = $request->input('password');       

        //  print_r($data);
      $row = DB::table('login_creates')->where([
         ['number',  $num],
        ['password',  $password],
       ])->first();
          // print_r($row);die;

      if ($row > '0') {
            $lo=$row->log_id;
            // print_r($lo);die;
         if($row->type == 3){
               $res=DB::table('doctors')->find($lo);
               
           }
                
            elseif($row->type == 4){
               $res=DB::table('employee')->find($lo);
               
           }
     
     
         else{
                    
           $res= $row;
           
         }
        
            // print_r($res);die;
         
           $data=array(
             // 'id'=>$res->id,
             'log'=>$res->id,
             'name'=>$res->name,
             'type'=>$row->type,
            );
            // print_r($data);die;
         $request->session()->put('sess',$data);
         return  redirect('dash');
        
        }
         else
         {
            return redirect('log_form')->with('success','Invalid Email and/or password.');
          }
       
         
  }
    
}
