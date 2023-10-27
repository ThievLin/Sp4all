<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Footer;
use App\Models\Menu;
use DB;
class FooterController extends Controller
{
    public function index()
    {
    	$foo = Footer::all();
    	$post = Post::where('post_type','=','page')->get();
    	$menu = Menu::all();
    	return view('admin.footer.index',compact('foo','post','menu'));
    }
    public function get_create_footer(){
    	$post = Post::where('post_type','=','page')->get();
    	return view('admin.footer.create',compact('post'));
    }
    public function post_create_footer(Request $request)
    {
    	$this->validate($request,[
    		'title' => 'required'
    	]);

    	$foo = [
    		'title' => $request->title,
    		'link'	=> $request->link,
    		'status' => $request->status,
    		'address' => $request->address,
    		'publish_date' => $request->publish_date,
    		'unpublish_date' => $request->unpublish_date,
    		'created_at' =>date('Y-m-d'),
    	];

    	$foo_id = Footer::insertGetId($foo);

    	if ($request->has('page_id')) {
                foreach ($request->page_id as $key => $p) {
                    $foo_page = [
                    'footer_id' => $foo_id,
                    'page_id' => $request->page_id[$key],
                    ];

                    DB::table('footer_pages')->insert($foo_page);
                }
            }
    	return redirect()->to('create_footer')->with('success','Successful Create');
    }
    public function get_edit_footer($id){
        $post = Post::where('post_type','=','page')->get();
        $foo_id = Footer::find($id);
        $foo_page = DB::table('footer_pages')->where('footer_id','=',$id)->get();
        return view('admin.footer.edit',compact('post','foo_id','foo_page'));
    }
    public function post_edit_footer(Request $request,$id)
    {

        $foo = [
            'title' => $request->title,
            'link'  => $request->link,
            'status' => $request->status,
            'address' => $request->address,
            'publish_date' => $request->publish_date,
            'unpublish_date' => $request->unpublish_date,
            'created_at' =>date('Y-m-d'),
        ];

        $foo_id = Footer::where('id','=',$id)->update($foo);
       
        DB::table('footer_pages')->where('footer_id','=',$id)->delete();

        if ($request->has('page_id')) {
                foreach ($request->page_id as $key => $p) {
                    $foo_page = [
                    'footer_id' => $foo_id,
                    'page_id' => $request->page_id[$key],
                    ];

                    DB::table('footer_pages')->insert($foo_page);
                }
            }
        return redirect()->to('create_footer')->with('success','Successful Create');
    }
    public function get_delete_footer($id)
    {
        DB::table('footer_pages')->where('footer_id','=',$id)->delete();
        $foo = Footer::find($id);
        $foo->delete();
        return redirect()->to('footer')->with('success','Deleted Successful');
    }
}
