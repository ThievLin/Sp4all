<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Auth;
use DB;
class BillboradController extends Controller
{
    public function index_billborad()
    {
    	$category = Category::where('category_type','=','billborad')->get();
    	return view('admin.billborad.index_billborad',compact('category'));
    }
    public function get_create_billborad()
    {
    	$category = Category::all();
    	return view('admin.billborad.create_billborad',compact('category'));
    }
    public function post_create_billborad(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required'
    		]);

    	if($request->hasFile('img')){
            $images = $request->file('img');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
             $fileName ="";
        }

    	$category = [
    		'name' => $request->name,
            'display_province' => $request->display_province,
            'img' => $fileName,
            'category_type' => 'billborad',
    		'description' => $request->description,
            // 'block' => $request->block,
            // 'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d'),
    		];

        Category::insert($category);

        return redirect()->to('create_billborad')->with('success','Successful Create');
    }
    public function get_edit_billborad($id)
    {
        $cat = Category::find($id);
        $category = Category::all();
        return view('admin.billborad.edit_billborad',compact('category','cat'));
    }

    public function post_edit_billborad(Request $request,$id)
    {
       $this->validate($request,[
            'name' => 'required'
            ]);
        if($request->hasFile('img')){
            $images = $request->file('img');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
             $fileName ="";
        }
        $category = [
            'name' => $request->name,
            'display_province' => $request->display_province,
            'img' => $fileName,
            'category_type' => 'billborad',
            'description' => $request->description,
            // 'block' => $request->block,
            // 'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'updated_at' => date('Y-m-d'),
            ];

        $cat = Category::where('id','=',$id)->update($category);

        return redirect()->to('billborad')->with('success','Updated Successful');
    }

    public function get_delete_billborad($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('billborad')->with('success', 'Deleted Successful');
    }

//=========Post Billborad===========================
    public function index_post_billborad()
    {
        $category = Category::where('category_type','=','billborad')->get();
        return view('admin.post_billborad.index_post_billborad',compact('category'));
    }
    public function get_create_post_billborad()
    {
        $category = Category::where('category_type','=','billborad')->get();
        $post = Post::all();
        return view('admin.post_billborad.create_post_billborad',compact('post','category'));
    }
    public function post_create_post_billborad(Request $request)
    {

        $this->validate($request,[
            'title' => 'required'
        ]);

        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
             $fileName ="";
        }

        $post = [
            'title' => $request->title,
            'link' => $request->link,
            'link_download' =>$request->link_download,
            'description' => $request->description,
            'status' => $request->status,
            'post_type' => 'post',
            'image' => $fileName,
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d'),
                ];

        $post_id = Post::insertGetId($post);

        if ($post_id != 0) {
            if ($request->has('categorie_id')) {
                foreach ($request->categorie_id as $key => $cat) {
                    $post_category = [
                    'post_id' => $post_id,
                    'categorie_id' => $request->categorie_id[$key],
                    ];

                    DB::table('post_categories')->insert($post_category);
                }
            }
        }

        return redirect()->to('create_post')->with('success','Created Successful');
    }

    public function get_edit_post_billborad($id)
    {
        $category = Category::all();
        $posts = Post::all();
        $post = Post::find($id);
        return view('admin.post.edit_post',compact('category','post','posts')); 
    }

    public function post_edit_post_billborad(Request $request,$id)
    {

        $this->validate($request,[
            'title' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
             $fileName =$post->image;
        }

        $post = [
            'title' => $request->title,
            'link' => $request->link,
            'link_download' =>$request->link_download,
            'description' => $request->description,
            'status' => $request->status,
            'publish_date' => $request->publish_date,
            'post_type' => 'post',
            'image' => $fileName,
            'user_id' => Auth::user()->id,
            'unpublish_date' => $request->unpublish_date,
            'created_at' => date('Y-m-d'),
                ];

        $post_id = Post::where('id','=',$id)->update($post);
       
        DB::table('post_categories')->where('post_id','=',$id)->delete();
        if ($request->has('categorie_id')) {
                foreach ($request->categorie_id as $key => $cat) {
                    $post_category = [
                    'post_id' => $id,
                    'categorie_id' => $request->categorie_id[$key],
                    ];

                    DB::table('post_categories')->insert($post_category);
                }
            }

        return redirect()->to('posts')->with('success','Updated Successful');
    }
    public function get_delete_post_billborad($id)
    {
        DB::table('post_categories')->where('categorie_id','=',$id)->delete();
        $post = Post::find($id);
        $post->delete();
        return redirect()->to('posts')->with('success','Deleted Successful');
    }

    public function list_district($id_district){
        $title = "List District";
        $data = Category::find($id_district);

        return view('admin.billborad.list_district',compact('title','data'));
    }

    public function get_create_district($id_district){
        $title = "Create District";
        $data = Category::where('status','=',1)
                ->where('display_province','=',$id_district)
                ->first();
        return view('admin.billborad.create_district',compact('title','data'));
    }

    public function post_create_district(Request $request){
        $this->validate($request,[
            'name' => 'required'
            ]);

        if($request->hasFile('img')){
            $images = $request->file('img');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
             $fileName ="";
        }

        $category = [
            'name' => $request->name,
            'display_district' => $request->display_district,
            'img' => $fileName,
            'category_type' => 'billborad',
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d'),
            ];

        Category::insert($category);

        return redirect()->to('create_billborad')->with('success','Successful Create');
    
    }
}
