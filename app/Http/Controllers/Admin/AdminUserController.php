<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\DeleteModelTrait;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $ur = User::class;
    public function index(){
        $users = User::latest()->paginate(10);
        return view('admin.User.index',compact('users'));
    }
    public function create(){
        
        return view('admin.user.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'address'=>'required',
            'avatar'=>'required',
           
            'phone'=>'required',
        ]);
       
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                
                'avatar'=>$request->avatar,
                'referral_code'=>1,
                'phone'=>$request->phone,
                'address'=>$request->address,
            ]);
            
            return redirect()->route('admin.user.index')->with('success','create successfully');
      
      
    }
    public function edit($id){
      
        $user = User::find($id);
      
      
        return view('admin.user.edit',compact('user'));
    }
    public function update($id,Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
           
            'avatar'=>'required',
            
            'phone'=>'required',
            'address'=>'required',
        ]);
        $user = User::find($id);
        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password == '' ? $user->password : $user->password),
            'user_login'=>$request->user_login,
            'avatar'=>$request->avatar,
            'status'=>$request->status,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);
      
        return redirect()->route('admin.user.index')->with('success','create successfully');
      
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->ur);
     }
}
