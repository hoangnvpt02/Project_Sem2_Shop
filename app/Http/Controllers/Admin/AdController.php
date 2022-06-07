<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class AdController extends Controller
{
    use DeleteModelTrait;
    private $ads = Admin::class;
    public function index(){
        $admins = Admin::latest()->paginate(10);
        return view('admin.ads.index',compact('admins'));
    }
    public function create(){
        
        return view('admin.ads.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'user_login'=>'required',
            'avatar'=>'required',
            'status'=>'required',
            'phone'=>'required',
        ]);
       
            $admin = Admin::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'user_login'=>$request->user_login,
                'avatar'=>$request->avatar,
                'status'=>$request->status,
                'phone'=>$request->phone,
            ]);
            
            return redirect()->route('admin.admins.index')->with('success','create successfully');
      
      
    }
    public function edit($id){
      
        $admin = Admin::find($id);
      
      
        return view('admin.ads.edit',compact('admin'));
    }
    public function update($id,Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'user_login'=>'required',
            'avatar'=>'required',
            'status'=>'required',
            'phone'=>'required',
        ]);
        $admin = Admin::find($id);
        Admin::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password == '' ? $admin->password : $request->password),
            'user_login'=>$request->user_login,
            'avatar'=>$request->avatar,
            'status'=>$request->status,
            'phone'=>$request->phone,
        ]);
      
        return redirect()->route('admin.admins.index')->with('success','create successfully');
      
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->ads);
     }
}
