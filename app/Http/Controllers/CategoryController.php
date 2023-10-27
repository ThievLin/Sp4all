<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;
use App\Models\Post;
class CategoryController extends Controller
{
    public function index_category()
    {
    	$category = Category::where('category_type','=','category')->get();
    	return view('admin.category.index_category',compact('category'));
    }
    public function get_create_category()
    {
    	$category = Category::where('category_type','=','category')->get();
    	return view('admin.category.create_category',compact('category'));
    }
    public function post_create_category(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|unique:category'
    		]);
    	$category = [
            'name' => $request->name,
            'language'=>$request->language,
    		'description' => $request->description,
            'block' => $request->block,
            'category_type' => 'category',
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' => date('Y-m-d h:i:s',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d h:i:s',strtotime($request->unpublish_date)) ,
            'created_at' => date('Y-m-d'),
    		];

        Category::insert($category);

        return redirect()->to('create_categorys')->with('success','Successful Create');
    }
    public function get_edit_category($id)
    {
        $cat = Category::find($id);
        $category = Category::where('category_type','=','category')->get();
        return view('admin.category.edit_category',compact('category','cat'));
    }

    public function post_edit_category(Request $request,$id)
    {
       $this->validate($request,[
            'name' => 'required'
            ]);

        $category = [
            'name' => $request->name,
            'language'=>$request->language,
            'description' => $request->description,
            'block' => $request->block,
            'category_type' => 'category',
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' => date('Y-m-d h:i:s',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d h:i:s',strtotime($request->unpublish_date)) ,
            'updated_at' => date('Y-m-d'),
            ];

        $cat = Category::where('id','=',$id)->update($category);

        return redirect()->to('categorys')->with('success','Updated Successful');
    }

    public function get_delete_category($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('categorys')->with('success', 'Deleted Successful');
    }
}
