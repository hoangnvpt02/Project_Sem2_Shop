<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\DeleteModelTrait;

class CategoryController extends Controller
{
    use DeleteModelTrait;
    private $catgory = Category::class;
    public function index(){
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }
    public function create(){
        return view('admin.category.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
        ]);
        $slug = Str::slug($request->name);
        $checkSlug = Category::where('slug',$slug)->first();

        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        Category::create([
            'name'=>$request->name,
            'slug'=>$slug,
            'created_by'=>8,
            'updated_by'=>9,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.category.index')->with('success','create successfully');
    }
    public function edit($id){
        $category = Category::find($id);
        
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
        ]);
        $slug = Str::slug($request->name);
        $checkSlug = Category::where('slug',$slug)->first();
        Category::find($id)->update([
            'name'=>$request->name,
            'slug'=>$slug,
            'created_by'=>8,
            'updated_by'=>9,
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.category.index')->with('success','update successfully');
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->catgory);
     }
}
