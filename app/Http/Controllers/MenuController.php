<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Menu;
use App\Models\Menu_type;
use Auth;
use DB;
class MenuController extends Controller
{
    public function index_menu(){
        $menu_type = Menu_type::all();
        $menu = Menu::all();
        return view('admin.menu.index_menu',compact('menu','menu_type'));
    }
    public function get_create_menu()
    {
        $menus = Menu::all();
        $menu_type = Menu_type::all();
    	return view('admin.menu.create_menu',compact('menu_type','menus'));
    }
    public function post_create_menu(Request $request){
        
        $this->validate($request,[
            'name' => 'required'
        ]);
        if($request->link != NULL){
            $link = $request->link;
        }
        else{
            $link = str_slug($request->name,'-');
        }
        if($request->translation)$link = $request->translation;
        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileNames = $images->getClientOriginalName();
            $fileName = str_replace(" ","-",$fileNames);
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
            $fileName = " ";
        }
        $menu = Menu::get();
        if($request->ordering != Null){
            $order = $request->ordering + 0.01;
        }
        else{
            $order = count($menu);
        }
        if(count($menu)>0){
            $menu_last_id = collect(Menu::orderBy('id','asc')->get())->last();
            $id_menu = $menu_last_id->id+1;
        }
        else{
            $id_menu = 1;
        }
            $data = [
                'id'=> $id_menu,
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'link' =>$link,
                'language' => $request->language,
                'status' => $request->status,
                'image' => $fileName,
                'menu_type_id' => $request->menu_type,
                'user_id' => Auth::user()->id,
                'ordering' => $order,
                'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
                'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
                'deleted' => 1,
                'created_at' => date('Y-m-d')
            ];

        $postcout = Post::get();
        if(count($postcout) > 0){
            $pos_last_id = collect(Post::orderBy('id','asc')->get())->last();
            $id_post = $pos_last_id->id + 1;
        }else{
            $id_post = 1;
        }
        $post = [
            'id' => $id_post,
            'title' => $request->name,
            'link' => $link,
            'language' => $request->language,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'post_type' => 'page',
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
            'created_at' => date('Y-m-d'),
            'deleted' => 0
            ];
            
        $menu_id = Menu::insertGetId($data); //Insert Menu

        $post_id = Post::insertGetId($post); //Insert Post

            if($menu_id != 0 && $post_id != 0 )
            {
                $post_menu =[
                        'menu_id' => $menu_id,
                        'post_id' => $post_id,
                            ];

                DB::table('menu_posts')->insert($post_menu); //Insert Post Menu

            }
        return redirect()->to('menu_create')->with('success','Successful Create');
    }
    public function get_edit_menu($id)
    {
        $menu = Menu::find($id);
        $menus = Menu::orderBy('ordering','asc')->get();
        $menu_type = Menu_type::all();
        return view('admin.menu.edit_menu',compact('menu_type','menus','menu'));
    }

    public function post_edit_menu(Request $request,$id)
    {
        $menu = Menu::find($id);

        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileNames = $images->getClientOriginalName();
            $fileName = str_replace(" ","-",preg_replace('/[^a-zA-Z0-9\/_|+ .-]/', '', $fileNames));
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
             $fileName =$request->image_hidden;
        }
        if($request->ordering != $menu->ordering){
        //   $order = $request->ordering + 0.01;
          $lang = $request->language;
          $count_menu = Menu::where('language',$lang)->orderBy('ordering','asc')->get();
          $count = count($count_menu);
          // $order = $request->ordering + 0.01;
          $order = $request->ordering;
          foreach ($count_menu as $key => $value) {
            $menus_id = Menu::find($value->id);
            $first_order = Menu::where('language',$lang)->orderBy('ordering','asc')->get()->first();
            $last_order = Menu::where('language',$lang)->orderBy('ordering','asc')->get()->last();

            if ($menu->id == $first_order->id) {
              if ($value->ordering <= $request->ordering) {
                // $order = $request->ordering;
                $up_order = [
                              'ordering'=>$menus_id->ordering - 1,
                            ];
                DB::table('menus')->where('id','=',$menus_id->id)->update($up_order);
              }
            }elseif($request->ordering == $last_order->ordering){
              if ($value->ordering > $menu->ordering && $value->ordering <= $request->ordering) {
                // $order = $request->ordering;
                $up_order = [
                              'ordering'=>$menus_id->ordering - 1,
                            ];
                DB::table('menus')->where('id','=',$menus_id->id)->update($up_order);
              }
            }else{
              // $order = $request->ordering;
              // $value->ordering > $menu->ordering && $value->ordering <= $request->ordering
              if ($request->ordering < $menu->ordering) {
                if ($value->ordering > $request->ordering && $value->ordering < $menu->ordering) {
                  $order = $request->ordering + 1;
                  $up_order = [
                                'ordering'=>$menus_id->ordering + 1,
                              ];
                  DB::table('menus')->where('id','=',$menus_id->id)->update($up_order);            
                }else{
                  $order = $request->ordering + 1;
                }
              }else{
                if ($value->ordering > $menu->ordering && $value->ordering <= $request->ordering) {
                  $up_order = [
                                'ordering'=>$menus_id->ordering - 1,
                              ];
                  DB::table('menus')->where('id','=',$menus_id->id)->update($up_order);
                }
              }
            }
          }
        }else{
          $order = $request->ordering;
        }
        if($request->link != Null){
          $link = $request->link ;
        }else{
          $link = str_slug($request->name,'-');
        }
        if($request->translation)$link = $request->translation;
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'link' => $link,
            'language' => $request->language,
            'status' => $request->status,
            'image' => $fileName,
            'menu_type_id' => $request->menu_type,
            'user_id' => Auth::user()->id,
            'ordering' => $order,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
            'updated_at' => date('Y-m-d'),
               ];

        $post = [
            'title' => $request->name,
            'link' => $link,
            'language' => $request->language,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'publish_date' => date('Y-m-d',strtotime($request->publish_date)),
            'unpublish_date' => date('Y-m-d',strtotime($request->unpublish_date)),
            'updated_at' => date('Y-m-d'),
                ];

        $menu_id = Menu::where('id','=',$id)->update($data);
    if(count($menu->pages)>0){
        $post_id = Post::where('id','=',$menu->pages->first()->id)->update($post);

    }else {
        $post_id = Post::insertGetId($post);
        
    }
        if($menu_id != 0 && $post_id != 0 )
        {
            $post_menu =[
                    'menu_id' => $id,
                    'post_id' => $menu->pages->first()->id,
                        ];

            DB::table('menu_posts')->where('menu_id','=',$id)->update($post_menu);

        }
        return redirect()->to('menus')->with('success','Successful Edit');
    }

    public function get_delete_menu($id)
    {
        $menu = Menu::find($id);
         Post::where('id','=',$menu->pages->first()->id)->delete();
         DB::table('menu_posts')->where('menu_id','=',$id)->delete();
        $menu->delete();

        return redirect()->to('menus')->with('success','Deleted Successful');
    }

    //multiple delete
    public function multiple_delete_menu(Request $request)
    {
      $ids=$request->get('ids');
      // dd($ids);
      $post=DB::delete('delete from menus where id in('.implode(',',$ids).')');
      foreach($ids as $value){
        DB::table('menu_posts')->where('menu_id','=',$value)->delete();
        // DB::table('page_categories')->where('page_id','=',$value)->delete();
      }
      return back();
    }
}
