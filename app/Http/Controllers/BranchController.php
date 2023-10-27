<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;
use App\Models\Post;
class BranchController extends Controller
{
    public function index_branch()
    {
      $category = Category::where('category_type','=','branch')->get();
      return view('admin.category.branch',compact('category'));
    }
    public function get_create_branch()
    {
      $category = Category::where('category_type','=','branch')->get();
      return view('admin.category.branch',compact('category'));
    }
    public function post_create_branch(Request $request)
    {
      $this->validate($request,[
        'name' => 'required|unique:category'
        ]);
        if($request->hasFile('image')){
              $images = $request->file('image');
              $destinationPath = "images/";
              $fileName = $images->getClientOriginalName();
              $fileupload = $images->move($destinationPath,$fileName);
          }else{
               $fileName ="";
          }
      $category = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,
            'status' => $request->status,
            'block' => 'branch',
            'category_type' => 'branch',
            'user_id' => Auth::user()->id,
            'img' => $fileName,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
            'created_at' => date('Y-m-d'),
        ];
    
        Category::insert($category);
    
        return redirect()->to('branch/create')->with('success','Successful Create');
    }
    public function get_edit_branch($id)
    {
        $cat = Category::find($id);
        $category = Category::all();
        return view('admin.category.branch',compact('category','cat'));
    }
    
    public function post_edit_branch(Request $request,$id)
    {
       $this->validate($request,[
            'name' => 'required'
            ]);
            $cat = Category::find($id);
            if($request->hasFile('image')){
                $images = $request->file('image');
                $destinationPath = "images/";
                $fileName = $images->getClientOriginalName();
                $fileupload = $images->move($destinationPath,$fileName);
            }else{
                 $fileName =$cat->image;
            }
        $category = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,
            'block' => 'branch',
            'category_type' => 'branch',
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'img' => $fileName,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
            'updated_at' => date('Y-m-d'),
            ];
    
        $cat = Category::where('id','=',$id)->update($category);
    
        return redirect()->to('branch')->with('success','Updated Successful');
    }
    
    public function get_delete_branch($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('branch')->with('success', 'Deleted Successful');
    }
}
