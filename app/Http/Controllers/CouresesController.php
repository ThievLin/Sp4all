<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;
use App\Models\Post;
class CouresesController extends Controller
{
    public function index_coureses_category()
  {
    $category = Category::where('category_type','=','coureses_category')->get();
    return view('admin.category.index_coureses_category',compact('category'));
  }
  public function get_create_coureses_category()
  {
    $category = Category::all();
    return view('admin.category.create_coureses_category',compact('category'));
  }
  public function post_create_coureses_category(Request $request)
  {
    $this->validate($request,[
      'name' => 'required'
      ]);
    $category = [
          'name' => $request->name,
          'description' => $request->description,
          'block' => 'list_new_cource',
          'status' => $request->status,
          'category_type' => 'coureses_category',
          'user_id' => Auth::user()->id,
          'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
          'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
          'created_at' => date('Y-m-d')
      ];

      Category::insert($category);

      return redirect()->to('create_coureses_categorys')->with('success','Successful Create');
  }
  public function get_edit_coureses_category($id)
  {
      $cat = Category::find($id);
      $category = Category::all();
      return view('admin.category.edit_coureses_category',compact('category','cat'));
  }

  public function post_edit_coureses_category(Request $request,$id)
  {
     $this->validate($request,[
          'name' => 'required'
          ]);

      $category = [
          'name' => $request->name,
          'description' => $request->description,
          'block' => 'list_new_cource',
          'category_type' => 'coureses_category',
          'status' => $request->status,
          'user_id' => Auth::user()->id,
          'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
          'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
          'updated_at' => date('Y-m-d'),
          ];

      $cat = Category::where('id','=',$id)->update($category);

      return redirect()->to('coureses_categorys')->with('success','Updated Successful');
  }

  public function get_delete_coureses_category($id)
  {
      $cat = Category::find($id);
      $cat->delete();
      return redirect('coureses_categorys')->with('success', 'Deleted Successful');
  }


    // Courese

    public function index_coureses_post()
    {
    $category = Category::where('category_type','=','coureses_category')->get();
    $post = Post::where('post_type','=','coureses')->get();
    return view('admin.post.index_coureses_post',compact('post','category'));
    }
    public function get_create_coureses_post()
    {
    $category = Category::where('category_type','=','coureses_category')->get();
    $post = Post::all();
    return view('admin.post.create_coureses_post',compact('post','category'));
    }
    public function post_create_coureses_post(Request $request)
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
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'post_type' => 'coureses',
            'image' => $fileName,
            'user_id' => Auth::user()->id,
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
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
    return redirect()->to('create_coureses_post')->with('success','Created Successful');
    }

    public function get_edit_coureses_post($id)
    {
    $category = Category::where('category_type','=','coureses_category')->get();
    $posts = Post::all();
    $post = Post::where('post_type','=','coureses')->where('id','=',$id)->first();
    return view('admin.post.edit_coureses_post',compact('category','post','posts'));
    }

    public function post_edit_coureses_post(Request $request,$id)
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
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'post_type' => 'coureses',
            'image' => $fileName,
            'user_id' => Auth::user()->id,
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
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

    return redirect()->to('coureses')->with('success','Updated Successful');
    }
    public function get_delete_coureses_post($id)
    {
    DB::table('page_categories')->where('page_id','=',$id)->delete();
    $post = Post::find($id);
        DB::table('post_image')->where('post_id','=',$id)->delete();
    $post->delete();
    return redirect()->to('coureses')->with('success','Deleted Successful');
    }
    // Courese


    // Company Career
    public function index_company()
    {
    $category = Category::where('category_type','=','company')->get();
    return view('admin.category.companey',compact('category'));
    }
    public function get_create_company()
    {
    $category = Category::where('category_type','=','company')->get();
    return view('admin.category.companey',compact('category'));
    }
    public function post_create_company(Request $request)
    {
    $this->validate($request,[
        'name' => 'required|unique:category'
        ]);
        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
            $fileName ="";
        }
    $category = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,
            'status' => $request->status,
            'num_of_staff' => $request->num_of_staff,
            'block' => 'company_career',
            'category_type' => 'company',
            'user_id' => Auth::user()->id,
            'img' => $fileName,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
            'created_at' => date('Y-m-d'),
        ];

        Category::insert($category);

        return redirect()->to('agencys/create')->with('success','Successful Create');
    }
    public function get_edit_company($id)
    {
        $cat = Category::find($id);
        $category = Category::all();
        return view('admin.category.companey',compact('category','cat'));
    }

    public function post_edit_company(Request $request,$id)
    {
    $this->validate($request,[
            'name' => 'required'
            ]);
            $cat = Category::find($id);
            if($request->hasFile('image')){
                $images = $request->file('image');
                $destinationPath = "images/";
                $fileName = $images->getClientOriginalName();
                $fileupload = $images->move($destinationPath,$fileName);
            }else{
                $fileName =$cat->image;
            }
        $category = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,
            'num_of_staff' => $request->num_of_staff,
            'block' => 'company_career',
            'category_type' => 'company',
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'img' => $fileName,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
            'updated_at' => date('Y-m-d'),
            ];

        $cat = Category::where('id','=',$id)->update($category);

        return redirect()->to('agencys')->with('success','Updated Successful');
    }

    public function get_delete_company($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('agencys')->with('success', 'Deleted Successful');
    }

    // End Company
    // Category Job

    public function index_jobs_category()
    {
    $category = Category::where('category_type','=','career')->get();
    return view('admin.category.cat_career',compact('category'));
    }
    public function get_create_jobs_category()
    {
    $category = Category::all();
    return view('admin.category.cat_career',compact('category'));
    }
    public function post_create_jobs_category(Request $request)
    {
    $this->validate($request,[
        'name' => 'required|unique:category'
        ]);
    $category = [
            'name' => $request->name,
            'description' => $request->description,
            'block' => 'career_list',
            'status' => $request->status,
            'category_type' => 'career',
            'user_id' => Auth::user()->id,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),

            'created_at' => date('Y-m-d'),
        ];

        Category::insert($category);

        return redirect()->to('category_jobs/create')->with('success','Successful Create');
    }
    public function get_edit_jobs_category($id)
    {
        $cat = Category::find($id);
        $category = Category::all();
        return view('admin.category.cat_career',compact('category','cat'));
    }

    public function post_edit_jobs_category(Request $request,$id)
    {
    $this->validate($request,[
            'name' => 'required'
            ]);

        $category = [
            'name' => $request->name,
            'description' => $request->description,
            'block' => 'career_list',
            'category_type' => 'career',
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),

            'updated_at' => date('Y-m-d'),
            ];

        $cat = Category::where('id','=',$id)->update($category);

        return redirect()->to('category_jobs')->with('success','Updated Successful');
    }

    public function get_delete_jobs_category($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('category_jobs')->with('success', 'Deleted Successful');
    }

// End Category  Job


// Career


    public function index_careers_post()
    {
    $post = Post::where('post_type','=','career')->get();
    return view('admin.post.career_index',compact('post'));
    }
    public function get_create_careers_post()
    {

    $post = Post::all();
        $company = Category::where('category_type','=','company')->get();
        $category = Category::where('category_type','=','career')->get();
    return view('admin.post.career_create',compact('post','company','category'));
    }
    public function post_create_careers_post(Request $request)
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
            'link' => str_slug($request->title,'-'),
            'link_download' =>$request->link_download,
            'description' => $request->description,
            's_from_rang' => $request->s_from_rang,
            's_to_rang'  => $request->s_to_rang,
            'status' => $request->status,
            'location_job' => $request->location_job,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'post_type' => 'career',
            'is_againt'=> $request->is_againt,
            'image' => $fileName,
            'user_id' => Auth::user()->id,
            'unpublish_date' =>date('Y-m-d',strtotime($request->unpublish_date)),
            'created_at' => date('Y-m-d'),
                ];

        $post_id = Post::insertGetId($post);

        if ($post_id != 0) {

                    $post_category = [
                    'page_id' => $post_id,
                    'categorie_id' => $request->category_id,
                    'company_id' => $request->company_id
                    ];

                    DB::table('page_categories')->insert($post_category);

        }



    return redirect()->to('careers/create')->with('success','Created Successful');
    }

    public function get_edit_careers_post($id)
    {
    $company = Category::where('category_type','=','company')->get();
    $category = Category::where('category_type','=','career')->get();
    $posts = Post::all();
    $post = Post::where('post_type','=','career')->where('id','=',$id)->first();
    return view('admin.post.career_edit',compact('company','category','post','posts'));
    }

    public function post_edit_careers_post(Request $request,$id)
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
            'link' => str_slug($request->title,'-'),
            'link_download' =>$request->link_download,
            'description' => $request->description,
            's_from_rang' => $request->s_from_rang,
            's_to_rang'  => $request->s_to_rang,
            'status' => $request->status,
            'location_job' => $request->location_job,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'post_type' => 'career',
            'is_againt'=> $request->is_againt,
            'image' => $fileName,
            'user_id' => Auth::user()->id,
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
            'created_at' => date('Y-m-d'),
                ];

        $post_id = Post::where('id','=',$id)->update($post);

        $post_category = [
        'page_id' => $id,
        'categorie_id' => $request->category_id,
        'company_id' => $request->company_id
        ];

        DB::table('page_categories')->where('page_id','=',$id)->update($post_category);

    return redirect()->to('careers')->with('success','Updated Successful');
    }
    public function get_delete_careers_post($id)
    {
    DB::table('page_categories')->where('page_id','=',$id)->delete();
    $post = Post::find($id);
    $post->delete();
    return redirect()->to('careers')->with('success','Deleted Successful');
    }
}
