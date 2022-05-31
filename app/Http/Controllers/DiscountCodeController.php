<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Discounts_code;
use App\Traits\DeleteModelTrait;

class DiscountCodeController extends Controller
{
    use DeleteModelTrait;
    private $discountcode = Discounts_code::class;
    public function index(){
        $discounts_code = Discounts_code::latest()->paginate(10);
        return view('admin.discountcode.index',compact('discounts_code'));
    }
    public function create(){
        $products = Product::all();
        return view('admin.discountcode.add',compact('products'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'price'=>'required',
            'code'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'product_id'=>'required',
            'status'=>'required',
        ]);
        Discounts_code::create([
            'price'=>$request->price,
            'code'=>$request->code,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'product_id'=>$request->product_id,
            'status'=>$request->status,
            'created_by'=>8,
            'updated_by'=>9,
        ]);

        return redirect()->route('admin.discountcode.index')->with('success','create successfully');
    }
    public function edit($id){
        $products = Product::all();
        $discountcode = Discounts_code::find($id);
        
        return view('admin.discountcode.edit',compact('products','discountcode'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'price'=>'required',
            'code'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'product_id'=>'required',
            'status'=>'required',
        ]);
       
        Discounts_code::find($id)->update([
            'code'=>$request->code,
            'price'=>$request->price,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'product_id'=>$request->product_id,
            'status'=>$request->status,
            'created_by'=>8,
            'updated_by'=>9,
        ]);
        return redirect()->route('admin.discountcode.index')->with('success','update successfully');
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->discountcode);
     }

}
