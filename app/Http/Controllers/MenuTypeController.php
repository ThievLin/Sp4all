<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Menu_type;
class MenuTypeController extends Controller
{
    public function index_menu_type()
    {
    	$data = Menu_type::all();
    	return view('admin.menu_type.index_menu_type',compact('data'));
    }
    public function get_create_menu_type()
    {
    	return view('admin.menu_type.create_menu_type');
    }
    public function post_create_menu_type(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|unique:menu_types'
    	]);
    	$data = [

    		'name' => $request->name,
    		'created_at'=> date('Y-m-d')
    	];

    	DB::table('menu_types')->insert($data);
    
    	return redirect()->to('create_menu_type')->with('success','Successful Create');

    }
    public function get_edit_menu_type($id)
    {
    	$data = Menu_type::find($id);
    	return view('admin.menu_type.edit_menu_type',compact('data'));
    }
    public function post_edit_menu_type(Request $request,$id)
    {
    	$this->validate($request,[
    		'name' => 'required|unique:menu_types'
    	]);

    	$data = [
    		'name' => $request->name,
    		'updated_at' => date('Y-m-d')
    	];
    	Menu_type::where('id','=',$id)->update($data);
    	return redirect()->to('menu_type')->with('success','Successful Update');	
    }
    public function get_deleted_menu_type($id)
    {
    	$data = Menu_type::find($id);
    	$data->delete();
    	return redirect()->to('menu_type')->with('success','Successful Deleted');	
    }
}
