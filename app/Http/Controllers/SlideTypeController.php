<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Slide;
use App\Models\Slide_Type;
class SlideTypeController extends Controller
{
    public function index_slide_type()
    {
    	$slide=Slide_type::all();
    	return view('admin.slide_type.index_slide_type',compact('slide'));
    }
    public function get_create_slide_type()
    {
    	return view('admin.slide_type.create_slide_type');
    }
    public function post_create_slide_type(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|unique:slide_type',

    	]);
    	$data = [

    		'name' => $request->name,
    		'description'=> $request->description,
    		'created_at'=> date('Y-m-d')
    	];
    	DB::table('slide_type')->insert($data);

    	return redirect()->to('create_slide_type')->with('success','Successful Create');
    }

    public function get_edit_slide_type($id)
    {
    	$slide=Slide_type::find($id);
    	return view('admin.slide_type.edit_slide_type',compact('slide'));

    }
   public function post_edit_slide_type(Request $request,$id)
   {
   	$this->validate($request,[
   		'name'=>'required',

   	]);
   	$data = [
    		'name' => $request->name,
    		'description'=> $request->description,
    		'updated_at' => date('Y-m-d')
    	];
    	Slide_type::where('id','=',$id)->update($data);
    	return redirect()->to('slide_types')->with('success','Successful Updated');
   }
    public function get_deleted_slide_type($id)
    {
        $slide = Slide_type::find($id);
        $slide->delete();
        return redirect()->to('slide_types')->with('success','Successful Deleted');
    }
}
