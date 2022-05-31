<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class GiftController extends Controller
{
    use DeleteModelTrait;
    private $gift = Gift::class;
    public function index(){
        $gifts = Gift::latest()->paginate(10);
        return view('admin.gift.index',compact('gifts'));
    }
    public function create(){
       
        return view('admin.gift.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'images'=>'required',
            'status'=>'required',
            'points'=>'required',
        ]);
        Gift::create([
            'images'=>$request->images,
            'points'=>$request->points,
            'created_by'=>8,
            'updated_by'=>9,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.gift.index')->with('success','create successfully');
    }
    public function edit($id){
       
        $gift = Gift::find($id);
        
        return view('admin.gift.edit',compact('gift'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'images'=>'required',
            'status'=>'required',
            'points'=>'required',
        ]);
       
        Gift::find($id)->update([
            'images'=>$request->images,
            'points'=>$request->points,
            'created_by'=>8,
            'updated_by'=>9,
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.gift.index')->with('success','update successfully');
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->gift);
     }
}
