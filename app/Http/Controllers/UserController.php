<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use DB;
use Auth;
use Input;
use Hash;
use App\Models\Category;
class UserController extends Controller
{
    public function index_user(Request $request)
    {
    	$data = User::all();
    	return view('admin.user.list_user',compact('data'));
    }
    public function get_create_user()
    {
    	$roles = Role::all();
    	$branch = Category::where('category_type','=','branch')->get();
    	return view('admin.user.create_user',compact('roles','branch'));
    }
    public function post_create_user(Request $request)
    {
    	$this->validate($request,[
    		'username'=>'required|unique:users',
    		'permission'=>'required',
    		'password'=>'required',
    		'comfirm_password'=>'required|same:password'
    	]);

        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
             $fileName ="";
        }
    	$data = [
            'name' => $request->name,
    		'username' => $request->username,
            'image' => $fileName,
            'branch_id' =>$request->branch_id,
    		'email' => $request->email,
            'phone' => $request->phone,
    		'status' => $request->status,
    		'password' => bcrypt($request->password),
    	];

    	$user_id = User::insertGetId($data);

    		if($user_id != 0){
    			foreach ($request->permission as $key => $value) {
    				$data_ur = [
    				 'user_id' => $user_id,
    				 'role_id' => $request->permission[$key]
    				];
    				DB::table('user_roles')->insert($data_ur);
    			}
    		}

    		return redirect('create_users')->with('success','Successfull Create');
    }
      public function get_edit_user($id)
    {
    	$roles = Role::all();
    	$data = User::find($id);
    	$branch = Category::where('category_type','=','branch')->get();
    	return view('admin.user.update_user',compact('roles','data','branch'));
    }
    public function post_edit_user(Request $request ,$id)
    {
        $user = User::find($id);

    	$this->validate($request,[
    		'username'=>'required',
    		'permission'=>'required',
    	]);

        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
            $fileName=$user->image;
        }
        
    	$data = [
            'name' => $request->name,
            'username' => $request->username,
            'image' => $fileName,
            'email' => $request->email,
            'branch_id' =>$request->branch_id,
            'phone' => $request->phone,
            'status' => $request->status,
        ];

    	$user_id = User::where('id','=',$id)->update($data);

    			DB::table('user_roles')->where('user_id','=',$id)->delete();
    			foreach ($request->permission as $key => $value) {
    				$data_ur = [
    				 'user_id' => $id,
    				 'role_id' => $request->permission[$key]
    				];
    				DB::table('user_roles')->insert($data_ur);
    			}
    		return redirect('users')->with('success','Successfull Update');
    }

    public function deleted_user($id){
    	$data = User::find($id);
    	  DB::table('user_roles')->where('user_id','=',$id)->delete();
    	$data->delete();
    	 return redirect('users')->with('success','Successfull Delete');
    }

    public function get_user_profile()
    {
        $data = User::all();
        return view('admin.user.myprofile');
    }
    public function post_user_profile(){
        return redirect()->to('admin');
    }
    public function get_change_user($id)
    {
        $data = User::find($id);
        return view('admin.user.change_user',compact('data'));
    }
    // public function post_change_user(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);

    //     $

    //     $this->validate($request,[
    //         bcrypt('old_password') => 'required|same:password',
    //         'new_password' => 'required',
    //         'comfirm_password' => 'required|same:password'
    //     ]);

    //     $user->fill([
    //         'password' => Hash::make($request->newPassword)
    //     ])->save();
    //     return redirect('users');
        
    // }
    public function post_change_user(Request $request, $id)
    {
        // $this->validate($request,[
        //     'old_password' => 'required',
        //     'new_password' => 'required',
        //     'comfirm_password' => 'required|same:password'
        // ]);
        $user = Auth::user();

        $old_password = Input::get('old_password');
        $password = bcrypt(Input::get('new_password'));
        $comfirm_password = bcrypt(Input::get('same::new_password'));

        if (Hash::check($old_password, $user->password)) {
            $user->password = $password;
            try {
                $user->save();
                $flag = TRUE;
            }
            catch(\Exception $e){
                $flag = FALSE;
            }
            if($flag){
                return redirect('login')->with('success',"Password changed successfully.");
            }
            else{
                return redirect('users')->with("errors","Unable to process request this time. Try again later");
            }
        }
        else{
            return redirect('users')->with("errors","Your current password do not match our record");
        }
    }
}
