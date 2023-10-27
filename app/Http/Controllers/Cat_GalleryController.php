<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cat_Gallery;
class Cat_GalleryController extends Controller
{
    public function index_cat_gallery()
    {
    	$cat_gallery = Cat_Gallery::all();
    	return view('admin.cat_gallery.index_cat_gallery',compact('cat_gallery'));
    }
    public function get_create_cat_gallery()
    {
    	$cat_gallery = Cat_Gallery::all();
    	return view('admin.cat_gallery.create_cat_gallery',compact('cat_gallery'));
    }
    public function post_create_cat_gallery(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|unique:cat_galleries',

    	]);
    	$data = [

    		'name' => $request->name,
    		'description'=> $request->description,
    		'created_at'=> date('Y-m-d')
    	];
    	Cat_Gallery::insert($data);
    
    	return redirect()->to('create_cat_galleries')->with('success','Successful Create');
    }
    public function get_edit_cat_gallery($id)
    {
    	$cat_gallery=Cat_Gallery::find($id);
    	return view('admin.cat_gallery.edit_cat_gallery',compact('cat_gallery'));

    }
   public function post_edit_cat_gallery(Request $request,$id)
   {
   	$this->validate($request,[
   		'name'=>'required',
   		
   	]);
   	$data = [
    		'name' => $request->name,
    		'description'=> $request->description,
    		'updated_at' => date('Y-m-d')
    	];

    	Cat_Gallery::where('id','=',$id)->update($data);
    	return redirect()->to('cat_galleries')->with('success','Successful Update');
   }
    public function get_deleted_cat_gallery($id)
    {
        $cat_gallery= Cat_Gallery::find($id);
        $cat_gallery->delete();
        return redirect()->to('cat_galleries')->with('success','Successful Deleted');   
    }
}
