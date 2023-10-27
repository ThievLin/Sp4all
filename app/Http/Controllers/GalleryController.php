<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Gallery;
use App\Models\Cat_Gallery;
use App\Model\Gallery_Image;
use App\Models\Post;
use Image;
use Auth;
class GalleryController extends Controller
{
    public function index_gallery()
    {
    	$cat_gallery = Cat_Gallery::all();
    	$gallery = Gallery::all();
    	return view('admin.gallery.index_gallery',compact('gallery','cat_gallery'));
    }
    public function get_create_gallery()
    {
    	$cat_gallery = Cat_Gallery::all();
    	$gallery = Gallery::all();
    	$page = Post::where('post_type','=','page')->get();
    	return view('admin.gallery.create_gallery',compact('gallery','page','cat_gallery'));
    }
    public function post_create_gallery(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required'
        ]);

        if($request->hasFile('feature_image')){
            $images = $request->file('feature_image');
            $destinationPath = "Galleries/";
            $imgNames = "gal_".$images->getClientOriginalName();

            $imgName = str_replace(" ","-",$imgNames);
            $fileupload = $images->move($destinationPath,$imgName);
            $thumbnailpaths = 'Galleries/'.$imgName;
            Image::make($thumbnailpaths)->fit(220)->save($thumbnailpaths);
            
        }else{
             $imgName ="";
        }

    	$gallery = [
            'name' => $request->name,
            'language' => $request->language,
            'feature_image' => $imgName,
    		'status' => $request->status,
    		'category_gallery_id' => $request->category_galleries,
            'user_id' => Auth::user()->id,
    		'created_at' => date('Y-m-d'),
    	       ];
        $gallery_id = Gallery::insertGetId($gallery);

        if($gallery_id != 0 )
        {
            $post_galleries =[
                'gallerie_id' => $gallery_id,
                'post_id' => $request->post_id,
                    ];

            DB::table('post_galleries')->insert($post_galleries);
        }

        if($gallery_id != 0){
            if($request->hasFile('images')){
                $image = $request->file('images');
                foreach ($request->images as $key => $value) {
                    $destinationPath ="Galleries/";
                    $fileName = $image[$key]->getClientOriginalName();                  
                    $updload = $image[$key]->move($destinationPath,$fileName);
                    // copy($destinationPath.$fileName, "Galleries/galleries_image/res_".$fileName);
                    // $thumbnailpath = 'Galleries/galleries_image/res_'.$fileName;
                    // Image::make($thumbnailpath)->fit(220)->save($thumbnailpath);

                     $im_gallery = [
                        'gallery_id' => $gallery_id,
                        'image' => $fileName,
                     ];

                     DB::table('galleries_image')->insert($im_gallery);
                }
            }else{
                foreach ($request->link2 as $key => $value) {
                    
                     $im_gallery = [
                        'gallery_id' => $gallery_id,
                        'link' => $request->link2[$key],
                     ];

                     DB::table('galleries_image')->insert($im_gallery);
                }
            }
        }
    	return redirect()->to('create_galleries')->with('success','Create Successful');
    }
    public function get_edit_gallery($id)
    {	
    	$cat_gallery = Cat_Gallery::all();
        $gallery = Gallery::all();
        $page = Post::where('post_type','=','page')->get();
        $gallery_id = Gallery::find($id);
        return view('admin.gallery.edit_gallery',compact('gallery','page','cat_gallery','gallery_id'));
    }
    public function post_edit_gallery(Request $request,$id)
    {
        $galData = Gallery::where('id','=',$id)->first();
    	$this->validate($request,[
            'name' => 'required',
           
        ]);
        if($request->hasFile('feature_image')){
            $images = $request->file('feature_image');
            $destinationPath = "Galleries/";
            $imgNames = $images->getClientOriginalName();
            $imgName = str_replace(" ","-",$imgNames);
            $fileupload = $images->move($destinationPath,$imgName);
            // $thumbnailpaths = 'Galleries/'.$imgName;
            // Image::make($thumbnailpaths)->fit(220)->save($thumbnailpaths);
        }else{
             $imgName = $galData->feature_image;
        }

        $gallery = [
            'name' => $request->name,
            'language' => $request->language,
            'feature_image' => $imgName,
            'status' => $request->status,
            'category_galleriy_id' => $request->category_galleries,
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d'),
               ];
        $gallery_id = Gallery::where('id','=',$id)->update($gallery);


        if($request->post_id != (!empty($galData->posts_gallery())?$galData->posts_gallery()->first()->id:0))
        {
            DB::table('post_galleries')->where('gallery_id',$id)->delete();
            $post_galleries =[
                'gallerie_id' => $id,
                'post_id' => $request->post_id,
                    ];

            DB::table('post_galleries')->insert($post_galleries);
        }
          

            if($request->hasFile('images')){
                  DB::table('galleries_image')->where('gallery_id','=',$id)->delete();
                $image = $request->file('images');

                foreach ($request->images as $key => $value) {
                    $image = $request->file('images');
                    $destinationPath ="Galleries/";
                   // echo $request->file('images')[$key] ."<br/>";
                    $fileName = $request->file('images')[$key]->getClientOriginalName();                
                    $updload = $request->file('images')[$key]->move($destinationPath,$fileName);
                    // copy($destinationPath.$fileName, "Galleries/galleries_image/res_".$fileName);
                    // $thumbnailpath = 'Galleries/galleries_image/res_'.$fileName;
                    // Image::make($thumbnailpath)->fit(220)->save($thumbnailpath);
                   
                     $im_gallery = [
                        'gallery_id' => $id,
                        'image' => $fileName,
                     ];
                   
                   DB::table('galleries_image')->insert($im_gallery);
                }
              
            }else{
              if($request->mult_image_hidden == 0){
                //   dd("else");
                  DB::table('galleries_image')->where('gallery_id','=',$id)->delete();
              }
            }

        return redirect()->to('gallery')->with('success','Updated Successful');
    }

    public function deleted_images($id){
        DB::table('galleries_image')->where('id','=',$id)->delete();
        return redirect()->back();
    }
    public function get_delete_gallery($id)
    {
    	$gallery_id = Gallery::find($id);
        DB::table('galleries_image')->where('gallery_id','=',$id)->delete();
        DB::table('post_galleries')->where('gallerie_id','=',$id)->delete();
    	$gallery_id->delete();
    	return redirect()->to('gallery')->with('success','Deleted Successful');
    }
}
