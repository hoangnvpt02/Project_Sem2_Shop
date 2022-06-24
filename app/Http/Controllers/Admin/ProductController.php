<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Products_image;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

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

        $file_thumb = $request->thumb;
        $imageName_thumb = time() . '.' . $file_thumb->getClientOriginalExtension();
        $file_thumb->move('storage/', $imageName_thumb);

        $product = Product::create([
            'name'=>$request->name,
            'slug'=>$slug,
            'price'=>$request->price,
            'thumb'=> $imageName_thumb,
            'description'=>$request->description,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'created_by'=>8,
            'updated_by'=>9,
        ]);

        foreach ($request->subphoto as $subphoto) {
            $product_image = new Products_image();
            $product_image->product_id = $product->id;

            $imageName_subphoto = time() . rand(1,1000000000) . '.' . $subphoto->getClientOriginalExtension();
            $subphoto->move('storage/', $imageName_subphoto);
            
            $product_image->image = $imageName_subphoto;
            $product_image->save();
        }

        return redirect()->route('admin.product.index')->with('success','create successfully');
    }
    public function edit($id){
        $categories = Category::all();
        $product = Product::find($id);
        $product_image = Products_image::where('product_id', $product->id)->get();
        return view('admin.product.edit',compact('categories','product', 'product_image'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);
        $slug = Str::slug($request->name);
        $checkSlug = Product::where('slug',$slug)->first();

        if (isset($request->thumb)) {
            $file_thumb = $request->thumb;
            $imageName_thumb = time() . '.' . $file_thumb->getClientOriginalExtension();
            $file_thumb->move('storage/', $imageName_thumb);
        }

        $product = Product::find($id);
        $product->name = $request->name;

        if (isset($request->thumb)) {
            $product->thumb = $imageName_thumb;
        }

        $product->slug = $slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->update();

        if (isset($request->subphoto)) {
            foreach ($request->subphoto as $subphoto) {
                $product_image = new Products_image();
                $product_image->product_id = $product->id;
    
                $imageName_subphoto = time() . rand(1,1000000000) . '.' . $subphoto->getClientOriginalExtension();
                $subphoto->move('storage/', $imageName_subphoto);
                
                $product_image->image = $imageName_subphoto;
                $product_image->save();
            }
        }

        return redirect()->route('admin.product.index')->with('success','update successfully');
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->pro);
    }
    public function deleteImage($id){
        $products_image = Products_image::find($id);

        if (!empty($products_image)) {
            $products_image->delete();
        }

        return redirect()->back();
    }
}
