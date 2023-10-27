<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Slide;
use App\Models\Slide_Type;
use App\Models\Language;
use Auth;
use DB;
class SlideController extends Controller
{
    public function index_slide()
    {
        $slide_type = Slide_Type::all();
        $slide = Slide::all();
        $lang = Language::where('status','=',1)->get();
        return view('admin.slide.index',compact('slide_type','slide','lang'));
    }
    public function get_create_slide()
    {
        $slide_type = Slide_Type::all();
        $slide = Slide::all();
        $page = Post::where('post_type','=','page')->get();
        $lang = Language::where('status','=',1)->get();
        return view('admin.slide.create',compact('slide_type','slide','page','lang'));
    }
    public function post_create_slide(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $slide = [
            'name' => $request->name,
            'language' => $request->language,
            'status' => $request->status,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'slide_type_id' => $request->slide_type,
            'publish_date' => $request->publish_date,
            'unpublish_date' => $request->unpublish_date,
            'created_at' => date('Y-m-d'),
               ];
        $slide_id = Slide::insertGetId($slide);

        if ($request->has('page_id')) {
                foreach ($request->page_id as $key => $p) {
                    $post_slides = [
                    'slide_id' => $slide_id,
                    'post_id' => $request->page_id[$key],
                    ];

                    DB::table('post_slide')->insert($post_slides);
                }
            }

        if($slide_id != 0){
            if($request->hasFile('images')){
                $image = $request->file('images');
                foreach ($request->images as $key => $value) {
                    $destinationPath ="Galleries/";
                    $fileName = $image[$key]->getClientOriginalName();                  
                    $updload = $image[$key]->move($destinationPath,$fileName);
                     $im_slide = [
                        'slide_id' => $slide_id,
                        'image' => $fileName,
                     ];

                     DB::table('slide_image')->insert($im_slide);
                }
            }else{
                foreach ($request->link2 as $key => $value) {
                    
                     $im_slide = [
                        'slide_id' => $slide_id,
                        'link' => $request->link2[$key],
                     ];

                     DB::table('slide_image')->insert($im_slide);
                }
            }
        }
        return redirect()->to('create_slide')->with('success','Create Successful');
    }
    public function get_edit_slide($id)
    {   
        $slide_id = Slide::find($id);
        $slide_type = Slide_Type::all();
        $slide = Slide::all();
        $lang = Language::where('status','=',1)->get();
        $slide_post = DB::table('post_slide')->where('slide_id','=',$id)->get();
        $page = Post::where('post_type','=','page')->get();
        return view('admin.slide.edit',compact('slide_id','slide_post','slide_type','slide','page','lang'));
    }
    public function post_edit_slide(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
           
        ]);

        $slide = [
            'name' => $request->name,
            'language' => $request->language,
            'description' => $request->description,
            'status' => $request->status,
            'slide_type_id' => $request->slide_type,
            'user_id' => Auth::user()->id,
            'updated_at' => date('Y-m-d'),
               ];
        $slide_id = Slide::where('id','=',$id)->update($slide);
        if ($request->has('page_id')) {
                foreach ($request->page_id as $key => $p) {
                    $post_slides = [
                    'slide_id' => $slide_id,
                    'post_id' => $request->page_id[$key],
                    ];

                    DB::table('post_slide')->insert($post_slides);
                }
            }
          
            if($request->hasFile('images')){
                  DB::table('slide_image')->where('slide_id','=',$id)->delete();
                $image = $request->file('images');

                foreach ($request->images as $key => $value) {
                    $image = $request->file('images')[$key];
                    $destinationPath ="Galleries/";
                   // echo $request->file('images')[$key] ."<br/>";
                    $fileName = $image->getClientOriginalName();                
                    $updload = $image->move($destinationPath,$fileName);
                   
                     $im_slide = [
                        'slide_id' => $id,
                        'image' => $fileName,
                     ];
                   
                   DB::table('slide_image')->insert($im_slide);
                }
              
            }else{
              if($request->mult_image_hidden == 0){
                //   dd("else");
                  DB::table('slide_image')->where('slide_id','=',$id)->delete();
              }
            }

        return redirect()->to('slides')->with('success','Updated Successful');
    }

    public function deleted_images($id){
        DB::table('slide_image')->where('id','=',$id)->delete();
        return redirect()->back();
    }
    public function get_delete_slide($id)
    {
        DB::table('slide_image')->where('slide_id','=',$id)->delete();

        $slide_id = Slide::find($id);
        $slide_id->delete();
        DB::table('post_slide')->where('slide_id','=',$slide_id)->delete();
        return redirect()->to('slides')->with('success','Deleted Successful');
    }

  //   public function index_slide()
  //   {   
  //   	$slide = Slide::all();
  //       $slide_type = Slide_type::all();
  //   	return view('admin.slide.index_slide',compact('slide_type','slide'));
  //   }
  //   public function get_create_slide()
  //   {
  //   	$slide=Slide::all();
  //       $slide_type = Slide_type::all();
  //   	return view('admin.slide.create_slide',compact('slide_type','slide'));
  //   }
  //   public function post_create_slide(Request $request)
  //   {
            
  //   	$this->validate($request,[
  //   		'name' => 'required',
  //   	]);
        
  //       if($request->hasFile('image')){
  //       	$destination = 'uploades/images/'; // your upload folder
		//     $image       = $request->file('image');
		//     $filename    = $image->getClientOriginalName(); // get the filename
		//     $image->move($destination, $filename); // move file to destination
		// }
		// else
		// {
		//      $filename="";
		// }
        
	 //    	$data = [
	 //    	'name' => $request->name,
  //   		'image' =>$filename,
  //           'slide_type_id'=>$request->slide_type_id,
  //   		'description'=> $request->description,
  //   		'content'=>$request->content,
  //   		'status'=>$request->status,
  //   		'publish_date'=>$request->publish_date,
  //   		'updated_at'=>$request->updated_at,
  //   		'created_at'=> date('Y-m-d'),
  //   	];

  //   	DB::table('slides')->insert($data);
 
  //   	return redirect()->to('create_slide')->with('success','Successful Create');
  //   }

  //   public function get_edit_slide($id)
  //   {
  //       $slide_type = Slide_type::all();
  //   	$slide=Slide::find($id);
  //   	return view('admin.slide.edit_slide',compact('slide','slide_type'));

  //   }
  //   public function post_edit_slide(Request $request,$id)
  //  	{
   	
		
	 //    $slide = Slide::find($id);
	    
  //       if($request->hasFile('image')){
  //   	    $destination = 'uploades/images/'; // your upload folder
  //   	    $image       = $request->file('image');
  //   	    $filename    = $image->getClientOriginalName(); // get the filename
  //   	    $image->move($destination, $filename); // move file to destination
		// }
		// else
		// {
		//     $filename=$slide->image;
		// } 
		//    	$data = [
  //   		'name' => $request->name,
  //   		'image' =>$filename,
  //           'slide_type_id'=>$request->slide_type_id,
  //   		'description'=> $request->description,
  //   		'content'=>$request->content,
  //   		'status'=>$request->status,
  //   		'publish_date'=>$request->publish_date,
  //   		'updated_at'=>$request->updated_at,
  //   		'updated_at' => date('Y-m-d')
  //   	];
  //   	Slide::where('id','=',$id)->update($data);
  //   	return redirect()->to('slides')->with('success','Successful Update');
  //  }
  //  public function get_deleted_slide($id)
  //   {
  //       $slide = Slide::find($id);
  //       $slide->delete();
  //       return redirect()->to('slides')->with('success','Successful Deleted');   
  //   }
}
