<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;
use App\Models\Post;
class NEventController extends Controller
{
    public function index_new_event_category()
  {
    $category = Category::where('category_type','=','cat_news_event')->get();
    return view('admin.new_event.news_cat',compact('category'));
  }
  public function get_create_new_event_category()
  {
    $category = Category::all();
    return view('admin.new_event.news_cat',compact('category'));
  }
  public function post_create_new_event_category(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:category'
      ]);

    $category = [
          'name' => $request->name,
          'language' => $request->language,
          'description' => $request->description,
          'block' => 'new_event',
          'status' => $request->status,
          'category_type' => 'cat_news_event',
          'user_id' => Auth::user()->id,
          'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
          'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
          'created_at' => date('Y-m-d'),
      ];

      Category::insert($category);

      return redirect()->to('category_news_events/create')->with('success','Successful Create');
  }
  public function get_edit_new_event_category($id)
  {
      $cat = Category::find($id);
      $category = Category::all();
      return view('admin.new_event.news_cat',compact('category','cat'));
  }

  public function post_edit_new_event_category(Request $request,$id)
  {
     $this->validate($request,[
          'name' => 'required'
          ]);

      $category = [
          'name' => $request->name,
          'language' => $request->language,
          'description' => $request->description,
          'block' => 'new_event',
          'category_type' => 'cat_news_event',
          'status' => $request->status,
          'user_id' => Auth::user()->id,
          'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
          'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
          'updated_at' => date('Y-m-d'),
          ];

      $cat = Category::where('id','=',$id)->update($category);

      return redirect()->to('category_news_events')->with('success','Updated Successful');
  }

  public function get_delete_new_event_category($id)
  {
      $cat = Category::find($id);
      $cat->delete();
      return redirect('category_news_events')->with('success', 'Deleted Successful');
  }

// Category News and Event

// News and Event

// Courese

public function index_news_event_post()
{
  $category = Category::where('category_type','=','cat_news_event')->get();
  $post = Post::where('post_type','=','news_event')->orderBy('id','desc')->get();
  return view('admin.new_event.new_post',compact('post','category'));
}
public function get_create_news_event_post()
{
  $category = Category::where('category_type','=','cat_news_event')->get();
  $post = Post::all();
  return view('admin.new_event.new_post',compact('post','category'));
}
public function post_create_news_event_post(Request $request)
{

  $this->validate($request,[
    'title' => 'required'
  ]);
    //show title
    if($request->show_title==1){
    $value=1;
    }else{
      $value=0;
    }
  if($request->link != Null){
    $link = str_slug($request->link ,'-');
  }else{
    $link = str_slug($request->title,'-');
  }
  if($request->hasFile('image')){
        $images = $request->file('image');
        $destinationPath = "images/";
        $fileNames = $images->getClientOriginalName();
        $fileName = str_replace(" ","-",$fileNames);
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
        'action_title'=>$value,
        'show_image_feature'=>$request->show_image_feature==1?1:0,
        'link' => $link,
        'language' => $request->language,
        'link_download' =>$request->link_download,
        'description' => $request->description,
        'status' => $request->status,
        'post_type' => 'news_event',
        'image' => $fileName,
        'user_id' => Auth::user()->id,
        'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
        'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
        'event_start_date' => date('Y-m-d H:i:s',strtotime($request->event_start_date)),
        'event_end_date' => date('Y-m-d H:i:s',strtotime($request->event_end_date)),
        'created_at' => date('Y-m-d'),
        'updated_at' => date('Y-m-d'),
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
                  $destinationPath = "Galleries/";
                  $fileName = $images->getClientOriginalName();
                  $fileupload = $images->move($destinationPath,$fileName);
                $post_image = [
                      'post_id' => $post_id,
                      'image' => $request->get('Galleries/',$fileName)
                ];

                DB::table('post_image')->insert($post_image);
          }
      }

    }
  return redirect()->to('news_events/create')->with('success','Created Successful');
}

public function get_edit_news_event_post($id)
{
  $category = Category::where('category_type','=','cat_news_event')->get();
  $posts = Post::all();
  $post = Post::where('post_type','=','news_event')->where('id','=',$id)->first();
  return view('admin.new_event.new_post',compact('category','post','posts'));
}

public function post_edit_news_event_post(Request $request,$id)
{

  $this->validate($request,[
        'title' => 'required'
    ]);

    //show title
    if($request->show_title==1){
      $value=1;
      }else{
        $value=0;
      }
    if($request->link != Null){
      $link = str_slug($request->link ,'-');
    }else{
      $link = str_slug($request->title,'-');
    }
    $post = Post::find($id);

    if($request->hasFile('image')){
        $images = $request->file('image');
        $destinationPath = "images/";
        $fileNames = $images->getClientOriginalName();
        $fileName = str_replace(" ","-",$fileNames);
        $fileupload = $images->move($destinationPath,$fileName);
    }else{
        $fileName =$request->image_hidden;
    }

    $post = [
        'title' => $request->title,
        'action_title'=>$value,
        'show_image_feature'=>$request->show_image_feature==1?1:0,
        'link' => $link,
        'language' => $request->language,
        'link_download' =>$request->link_download,
        'description' => $request->description,
        'status' => $request->status,
        'post_type' => 'news_event',
        'image' => $fileName,
        'user_id' => Auth::user()->id,
        'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
        'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
        'event_start_date' => date('Y-m-d H:i:s',strtotime($request->event_start_date)),
        'event_end_date' => date('Y-m-d H:i:s',strtotime($request->event_end_date)),
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
                  $destinationPath = "Galleries/";
                  $fileName = $images->getClientOriginalName();
                  $fileupload = $images->move($destinationPath,$fileName);
                $post_image = [
                      'post_id' => $id,
                      'image' => $request->get('Galleries/',$fileName)
                ];

                DB::table('post_image')->insert($post_image);
          }
      }else{
          if($request->mult_image_hidden == 0){
            //   dd("else");
              DB::table('post_image')->where('post_id','=',$id)->delete();
          }
      }

  return redirect()->to('news_events')->with('success','Updated Successful');
}
  public function get_delete_news_event_post($id)
  {
    DB::table('page_categories')->where('page_id','=',$id)->delete();
    $post = Post::find($id);
      DB::table('post_image')->where('post_id','=',$id)->delete();
    $post->delete();
    return redirect()->to('news_events')->with('success','Deleted Successful');
  }

    //multiple delete
    public function multiple_delete_new_event(Request $request)
    {
      $ids=$request->get('ids');
      // dd($ids);
      $post=DB::delete('delete from posts where id in('.implode(',',$ids).')');
      foreach($ids as $value){
        DB::table('post_image')->where('post_id','=',$value)->delete();
        DB::table('page_categories')->where('page_id','=',$value)->delete();
      }
      return back();
    }
}
