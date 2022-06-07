<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use DeleteModelTrait;
    private $pro = Product::class;
    public function index(){
        $products = Product::latest()->paginate(10);
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.product.add',compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'thumb'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);
        $slug = Str::slug($request->name);
        $checkSlug = Product::where('slug',$slug)->first();
        Product::create([
            'name'=>$request->name,
            'slug'=>$slug,
            'price'=>$request->price,
            'thumb'=>$request->thumb,
            'description'=>$request->description,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'created_by'=>8,
            'updated_by'=>9,
        ]);

        return redirect()->route('admin.product.index')->with('success','create successfully');
    }
    public function edit($id){
        $categories = Category::all();
        $product = Product::find($id);
        
        return view('admin.product.edit',compact('categories','product'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'thumb'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);
        $slug = Str::slug($request->name);
        $checkSlug = Product::where('slug',$slug)->first();
        Product::find($id)->update([
            'name'=>$request->name,
            'slug'=>$slug,
            'price'=>$request->price,
            'thumb'=>$request->thumb,
            'description'=>$request->description,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'created_by'=>8,
            'updated_by'=>9,
        ]);
        return redirect()->route('admin.product.index')->with('success','update successfully');
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->pro);
     }
}
