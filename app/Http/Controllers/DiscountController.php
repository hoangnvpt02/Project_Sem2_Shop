<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class DiscountController extends Controller
{
    use DeleteModelTrait;
    private $discount = Discount::class;
    public function index(){
        $discounts = Discount::latest()->paginate(10);
        return view('admin.discount.index',compact('discounts'));
    }
    public function create(){
        $products = Product::all();
        return view('admin.discount.add',compact('products'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'price'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'product_id'=>'required',
            'status'=>'required',
        ]);
        Discount::create([
            'price'=>$request->price,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'product_id'=>$request->product_id,
            'status'=>$request->status,
            'created_by'=>8,
            'updated_by'=>9,
        ]);

        return redirect()->route('admin.discount.index')->with('success','create successfully');
    }
    public function edit($id){
        $products = Product::all();
        $discount = Discount::find($id);
        
        return view('admin.discount.edit',compact('products','discount'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'price'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'product_id'=>'required',
            'status'=>'required',
        ]);
       
        Discount::find($id)->update([
            'price'=>$request->price,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'product_id'=>$request->product_id,
            'status'=>$request->status,
            'created_by'=>8,
            'updated_by'=>9,
        ]);
        return redirect()->route('admin.discount.index')->with('success','update successfully');
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->discount);
     }
}
