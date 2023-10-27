<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Social;
class SocialController extends Controller
{
    public function index_social()
    {
    	$social = Social::all();
    	return view('admin.social.index_social',compact('social'));
    }
    public function get_create_social()
    {	
    	$social = Social::all();
    	return view('admin.social.create_social',compact('social'));
    }
    public function post_create_social(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required'
    	]);

    	if($request->hasFile('image'))
    	{
            $image = $request->file('image');
            $destinationPath = "images/";
            $fileName = $image->getClientOriginalName();
            $fileupload = $image->move($destinationPath,$fileName);
        }
        else
        {
             $fileName ="";
        }
    	$social = [
            'name' => $request->name,
    		'class' => $request->class,
    		'status' => $request->status,
    		'image_icon' => $fileName,
    		'link' => $request->link,
            'user_id' => Auth::user()->id,
    		'created_at' => date('Y-m-d'),
    	       ];
               
    	Social::insert($social);

    	return redirect()->to('create_social')->with('success','Create Successful');
    }
    public function get_edit_social($id)
    {	
    	$social_id = Social::find($id);
    	$social = Social::all();
    	return view('admin.social.edit_social',compact('social','social_id'));
    }
    public function post_edit_social(Request $request,$id)
    {
    	$this->validate($request,[
    		'name' => 'required'
    	]);
        $social = Social::find($id);
    	if($request->hasFile('image'))
    	{
            $image = $request->file('image');
            $destinationPath = "images/";
            $fileName = $image->getClientOriginalName();
            $fileupload = $image->move($destinationPath,$fileName);
        }
        else
        {
             $fileName =$social->image_icon;
        }
    	$social = [
            'name' => $request->name,
    		'class' => $request->class,
    		'status' => $request->status,
    		'image_icon' => $fileName,
    		'link' => $request->link,
            'user_id' => Auth::user()->id,
    		'updated_at' => date('Y-m-d'),
    	       ];
               
    	Social::where('id','=',$id)->update($social);

    	return redirect()->to('social')->with('success','Update Successful');
    }

    public function get_delete_social($id)
    {
    	$social_id = Social::find($id);
    	$social_id->delete();
    	return redirect()->to('social')->with('success','Deleted Successful');
    }
}
