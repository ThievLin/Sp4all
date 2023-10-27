<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;
use App\Models\Post;
class ProductController extends Controller
{
    public function index_product_category()
    {
    	$category = Category::where('category_type','=','product')->get();
    	return view('admin.product.category.category',compact('category'));
    }
    public function get_create_product_category()
    {
    	$category = Category::where('category_type','=','product')->get();
    	return view('admin.product.category.category',compact('category'));
    }
    public function post_create_product_category(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|unique:category'
    		]);
    	$category = [
    		'name' => $request->name,
    		'description' => $request->description,
            'block' => 'product_list',
            'category_type' => 'product',
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' =>  date("Y-m-d h:i:s", strtotime($request->publish_date)),
            'unpublish_date' =>  date("Y-m-d h:i:s", strtotime($request->unpublish_date)),
            'created_at' => date('Y-m-d'),
    		];

        Category::insert($category);

        return redirect()->to('products-category/create')->with('success','Successful Create');
    }
    public function get_edit_product_category($id)
    {
        $cat = Category::find($id);
        $category =Category::where('category_type','=','product')->get();
        return view('admin.product.category.category',compact('category','cat'));
    }

    public function post_edit_product_category(Request $request,$id)
    {
       $this->validate($request,[
            'name' => 'required'
            ]);

        $category = [
            'name' => $request->name,
            'description' => $request->description,
            'block' => 'product_list',
            'category_type' => 'product',
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' =>  date("Y-m-d h:i:s", strtotime($request->publish_date)),
            'unpublish_date' =>  date("Y-m-d h:i:s", strtotime($request->unpublish_date)),
            'updated_at' => date('Y-m-d'),
            ];

        $cat = Category::where('id','=',$id)->update($category);

        return redirect()->to('products-category')->with('success','Updated Successful');
    }

    public function get_delete_product_category($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('products-category')->with('success', 'Deleted Successful');
    }
//Brand

    public function index_product_brand()
    {
    	$category = Category::where('category_type','=','product-brand')->get();
    	return view('admin.product.category.brand',compact('category'));
    }
    public function get_create_product_brand()
    {
    	$category = Category::where('category_type','=','product-brand')->get();
    	return view('admin.product.category.brand',compact('category'));
    }
    public function post_create_product_brand(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required'
    		]);
    	$category = [
    		'name' => $request->name,
    		'description' => $request->description,
            'block' => 'product_list',
            'category_type' => 'product-brand',
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' =>  date("Y-m-d h:i:s", strtotime($request->publish_date)),
            'unpublish_date' =>  date("Y-m-d h:i:s", strtotime($request->unpublish_date)),
            'created_at' => date('Y-m-d'),
    		];

        Category::insert($category);

        return redirect()->to('products-brand/create')->with('success','Successful Create');
    }
    public function get_edit_product_brand($id)
    {
        $cat = Category::find($id);
        $category =Category::where('category_type','=','product-brand')->get();
        return view('admin.product.category.brand',compact('category','cat'));
    }

    public function post_edit_product_brand(Request $request,$id)
    {
       $this->validate($request,[
            'name' => 'required'
            ]);

        $category = [
            'name' => $request->name,
            'description' => $request->description,
            'block' => 'product_list',
            'category_type' => 'product-brand',
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' =>  date("Y-m-d h:i:s", strtotime($request->publish_date)),
            'unpublish_date' =>  date("Y-m-d h:i:s", strtotime($request->unpublish_date)),
            'updated_at' => date('Y-m-d'),
            ];

        $cat = Category::where('id','=',$id)->update($category);

        return redirect()->to('products-category')->with('success','Updated Successful');
    }

    public function get_delete_product_brand($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('products-brand')->with('success', 'Deleted Successful');
    }

// Product 

        public function index_product()
        {
            $category = Category::where('category_type','=','product')->get();
            $post = Post::where('post_type','=','product')->get();
            return view('admin.product.index_product',compact('post','category'));
        }
        public function get_create_product()
        {
            $category = Category::get();
            $post = Post::all();
            return view('admin.product.create_product',compact('post','category'));
        }
        public function post_create_productt(Request $request)
        {

            $this->validate($request,[
                'title' => 'required'
            ]);

        if($request->link != Null){
            $link = str_slug($request->link ,'-');
        }else{
            $link = str_slug($request->title,'-');
        }
            if($request->hasFile('image')){
                $images = $request->file('image');
                $destinationPath = "images/";
                $fileName = $images->getClientOriginalName();
                $fileupload = $images->move($destinationPath,$fileName);
            }else{
                $fileName ="";
            }

            $postcout = Post::get();
            if(count($postcout) > 0){
            $pos_last_id = collect(Post::orderBy('id','asc')->get())->last();
            $id_post = $pos_last_id->id + 1;
            }else{
            $id_post = 1;
            }
            $post = [
                'id' => $id_post,
                'title' => $request->title,
                'link' => $link,
                'link_download' =>$request->link_download,
                'description' => $request->description,
                'status' => $request->status,
                'publish_date' =>  date("Y-m-d h:i:s", strtotime($request->publish_date)),
                'post_type' => 'product',
                'image' => $fileName,
                'user_id' => Auth::user()->id,
                'unpublish_date' =>  date("Y-m-d h:i:s", strtotime($request->unpublish_date)),
                'created_at' => date('Y-m-d'),
                    ];

            $post_id = Post::insertGetId($post);

            if ($post_id != 0) {
                    if ($request->has('categorie_id')) {
                        foreach ($request->categorie_id as $key => $cat) {
                            $post_category = [
                            'page_id' => $post_id,
                            'categorie_id' => $request->categorie_id[$key],
                            ];
    
                            DB::table('page_categories')->insert($post_category);
                        }
                    }
                    if ($request->has('brand_id')) {
                        foreach ($request->brand_id as $key => $cat) {
                            $post_category = [
                            'page_id' => $post_id,
                            'brand_id' => $request->brand_id[$key],
                            ];
    
                            DB::table('page_categories')->insert($post_category);
                        }
                    }
                    
            if($request->hasFile('image_multi')){
                foreach ($request->file('image_multi') as $ke => $value) {
                        $images = $request->file('image_multi')[$ke];
                        $destinationPath = "images/";
                        $fileName = $images->getClientOriginalName();
                        $fileupload = $images->move($destinationPath,$fileName);
                        $post_image = [
                            'post_id' => $post_id,
                            'image' => $request->get('images/',$fileName)
                        ];

                        DB::table('post_image')->insert($post_image);
                }
            }

            }



            return redirect()->to('products-product/create')->with('success','Created Successful');
        }

        public function get_edit_product($id)
        {
            $category = Category::get();
            $posts = Post::all();
            $post = Post::where('post_type','=','product')->where('id','=',$id)->first();
            return view('admin.product.edit_product',compact('category','post','posts'));
        }

        public function post_edit_product(Request $request,$id)
        {

            $this->validate($request,[
                'title' => 'required'
            ]);
            if($request->link != Null){
            $link = str_slug($request->link ,'-');
            }else{
            $link = str_slug($request->title,'-');
            }
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
                'link' => $link,
                'link_download' =>$request->link_download,
                'description' => $request->description,
                'status' => $request->status,
                'publish_date' =>  date("Y-m-d h:i:s", strtotime($request->publish_date)),
                'post_type' => 'product',
                'image' => $fileName,
                'user_id' => Auth::user()->id,
                'unpublish_date' =>  date("Y-m-d h:i:s", strtotime($request->unpublish_date)),
                'created_at' => date('Y-m-d'),
                    ];

            $post_id = Post::where('id','=',$id)->update($post);

            DB::table('page_categories')->where('page_id','=',$id)->delete();
            if ($request->has('categorie_id')) {
                    foreach ($request->categorie_id as $key => $cat) {
                        $post_category = [
                        'page_id' => $id,
                        'categorie_id' => $request->categorie_id[$key],
                        ];

                        DB::table('page_categories')->insert($post_category);
                    }
                }
             if ($request->has('brand_id')) {
                        foreach ($request->brand_id as $key => $cat) {
                            $post_category = [
                            'page_id' => $id,
                            'brand_id' => $request->brand_id[$key],
                            ];
    
                            DB::table('page_categories')->insert($post_category);
                        }
                    }
            if($request->hasFile('image_multi')){
                DB::table('post_image')->where('post_id','=',$id)->delete();
                foreach ($request->file('image_multi') as $ke => $value) {
                        $images = $request->file('image_multi')[$ke];
                        $destinationPath = "images/";
                        $fileName = $images->getClientOriginalName();
                        $fileupload = $images->move($destinationPath,$fileName);
                        $post_image = [
                            'post_id' => $id,
                            'image' => $request->get('images/',$fileName)
                        ];

                        DB::table('post_image')->insert($post_image);
                }
            }

            return redirect()->to('products-product')->with('success','Updated Successful');
        }
        public function get_delete_product($id)
        {
            DB::table('page_categories')->where('page_id','=',$id)->delete();
            $post = Post::find($id);
            DB::table('post_image')->where('post_id','=',$id)->delete();
            $post->delete();
            return redirect()->to('products-product')->with('success','Deleted Successful');
        }
}
