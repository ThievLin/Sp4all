<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Widget;
class SettingController extends Controller
{
    public function index_setting()
    {
        $lang = Language::where('status','=',1)->get();
        $setting = Setting::all();
        if (count($setting) == 1) {
            $set_id = Setting::first();
        }
        else{
            $set_id = Setting::all();
        }
        return view('admin.setting.index_setting',compact('lang','setting','set_id'));
    }
    public function get_create_setting()
    {
    	$setting = Setting::all();
    	return view('admin.setting.create_setting',compact('setting'));
    }
    public function post_create_setting(Request $request)
    {
    	$this->validate($request,[
    		'website_name' => 'required'
    	]);

    	if($request->hasFile('logo_image'))
    	{
            $logo_image = $request->file('logo_image');
            $destinationPath = "images/";
            $fileNameLogo = $logo_image->getClientOriginalName();
            $fileupload = $logo_image->move($destinationPath,$fileNameLogo);
        }
        else
        {
             $fileNameLogo ="";
        }

        if($request->hasFile('favicon_image'))
        {
            $favicon_image = $request->file('favicon_image');
            $destinationPath = "images/";
            $fileFavicon = $favicon_image->getClientOriginalName();
            $fileupload = $favicon_image->move($destinationPath,$fileFavicon);
        }
        else
        {
             $fileFavicon ="";
        }
    	$setting = [
            'website_name' => $request->website_name,
    		'website_url' => $request->website_url,
            'language' => $request->language,
    		'logo_image' => $fileNameLogo,
            'description'=>$request->description,
            'phone' => $request->phone,
            'email'=>$request->email,
            'work_time' => $request->work_time,
    		'favicon_image' => $fileFavicon,
    		'logo_text' => $request->logo_text,
    		'copyright' => $request->copyright,
            'address_site' => $request->address_site,
            'address' => $request->address,
            'link_fb' => $request->link_fb,
            'user_id' => Auth::user()->id,
    		'created_at' => date('Y-m-d'),
    	       ];

    	Setting::insert($setting);

    	return redirect()->to('create_setting')->with('success','Created Successful');
    }
    public function get_edit_setting($id)
    {
        $setting = Setting::all();
        $set_id = Setting::find($id);
        return view('admin.setting.create_setting',compact('setting','set_id'));
    }
    public function post_edit_setting(Request $request,$id)
    {
        $this->validate($request,[
            'website_name' => 'required'
        ]);
        $setting = Setting::find($id);
        if($request->hasFile('logo_image'))
        {
            $logo_image = $request->file('logo_image');
            $destinationPath = "images/";
            $fileNameLogo = $logo_image->getClientOriginalName();
            $fileupload = $logo_image->move($destinationPath,$fileNameLogo);
        }
        else
        {
             $fileNameLogo =$setting->logo_image;
        }

        if($request->hasFile('favicon_image'))
        {
            $favicon_image = $request->file('favicon_image');
            $destinationPath = "images/";
            $fileFavicon = $favicon_image->getClientOriginalName();
            $fileupload = $favicon_image->move($destinationPath,$fileFavicon);
        }
        else
        {
             $fileFavicon =$setting->favicon_image;
        }
        $setting = [
            'phone' => $request->phone,
            'work_time' => $request->work_time,
            'website_name' => $request->website_name,
            'website_url' => $request->website_url,
            'logo_image' => $fileNameLogo,
            'email'=>$request->email,
            'description'=>$request->description,
            'language' => $request->language,
            'favicon_image' => $fileFavicon,
            'logo_text' => $request->logo_text,
            'copyright' => $request->copyright,
            'address_site' => $request->address_site,
            'address' => $request->address,
            'link_fb' => $request->link_fb,
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d'),
               ];

        Setting::where('id','=',$id)->update($setting);

        return redirect()->to('setting')->with('success','Updated Successful');
    }


    public function widget_jndex(){
      $widget = Widget::get();
      $lang = Language::get();
       return view('admin.widget.widget_index',compact('widget','lang'));
    }

    public function post_widget_index(Request $request){

            $this->validate($request ,[
              'title' => 'required',
              'page_side' => 'required',
              'position' => 'required'
            ]);


            $widget = Widget::get();
            if(count($widget) > 0){
               DB::table('widget')->delete();
            }
        foreach ($request->page_side as $key => $value) {
            $data_re = [
                          'id' => $key+1,
                          'title' => $request->title[$key],
                          'page_side' => $request->page_side[$key],
                          'position' => $request->position[$key]
                      ];
              Widget::insert($data_re);
        }
        return redirect()->to('widgets')->with('success','Create Successful');
    }
}
