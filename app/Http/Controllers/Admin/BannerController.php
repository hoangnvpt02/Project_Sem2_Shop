<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class BannerController extends Controller
{
    use DeleteModelTrait;
    private $banner = Banner::class;
    public function index(){
        $banners = Banner::latest()->paginate(5);
        return view('admin.banner.index',compact('banners'));
    }
    public function create(){
        $categorise = Category::all();
        return view('admin.banner.add',compact('categorise'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'image'=>'required',
            'category_id'=>'required',
        ]);
        Banner::create([
            'image'=>$request->image,
            'created_by'=>8,
            'updated_by'=>9,
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('admin.banner.index')->with('success','create successfully');
    }
    public function edit($id){
        $categories = Category::all();
        $banner = Banner::find($id);
        
        return view('admin.banner.edit',compact('categories','banner'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'image'=>'required',
            'category_id'=>'required',
        ]);
       
        Banner::find($id)->update([
            'image'=>$request->image,
            'created_by'=>8,
            'updated_by'=>9,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('admin.banner.index')->with('success','update successfully');
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->banner);
     }
}
