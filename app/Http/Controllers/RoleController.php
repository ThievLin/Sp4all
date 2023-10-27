<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use DB;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index_role()
    {
    	$data = Role::all();
    	return view('admin.user.index_role',compact('data'));
    }

    public function get_create_role()
    {
    	return view('admin.user.create_role');
    }
    public function post_create_role(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|unique:roles'
    	]);
    	$data = [

    		'name' => $request->name,
        	'display_name' => $request->display_name,
    		'description' => $request->description,
    	];

    	Role::create($data);
    
    	return redirect()->to('create_roles')->with('success','Successful Create');

    }

   public function get_edit_role($id)
   {
   		$data=Role::find($id);
   		return view('admin.user.update_role', compact('data'));
   }
   public function post_edit_role(Request $request, $id)
   {
   	 	$this->validate($request,[
    		'name' => 'required|unique:roles'
    	]);
    	$data = [
    		'name' => $request->name,
        	'display_name' => $request->display_name,
    		'description' => $request->description,
    	];

    	Role::where('id','=',$id)->update($data);
    
    	return redirect()->to('roles')->with('success','Successful Edit');
   }

   public function delete_role($id)
   {
   		$data=Role::find($id);
   		$data->delete();
   		return redirect()->to('roles')->with('success','Successful Delete');
   }

}
