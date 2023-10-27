<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use Auth;
use DB;

class AvertisingController extends Controller
{
    public function index_ads()
    {
      $data=Ads::all();
    	return view('admin.ads.index_ads',compact('data'));
    }   	
    public function get_create_ads()
    {
    	return view('admin.ads.create_ads');
    }
	public function post_create_ads(Request $request)
	{
		$this->validate($request, [
			'images' => 'required',
      		'layout' => 'required',
			
		]);

		$data = [
			'text' => $request->text,
			'status' => $request->status,
			'link_fb'	=> $request->link_fb,
			'link_yt'	=> $request->link_yt,
			'layout' => $request->layout,
      		'user_id' => Auth::user()->id,
			'created_at'=> date('Y-m-d')
		];
		$ads_id = Ads::insertGetId($data);
       if($ads_id != 0){
       	  if($request->hasFile('images')){
       		$image = $request->file('images');
       	 	foreach ($request->images as $key => $value) {
				$destinationPath ="Ads/";
				$fileName = $image[$key]->getClientOriginalName();      	 		
				$updload = $image[$key]->move($destinationPath,$fileName);
       	 		 $im_ad = [
       	 		 	'ads_id' => $ads_id,
       	 		 	'image' => $fileName,
       	 		 	'link' => $request->links1[$key]
       	 		 ];

       	 		 DB::table('ads_images')->insert($im_ad);
       	 	}
       	 }
       }
		return redirect()->to('create_ads')->with('success','Successful Create');

    }

    public function get_edit_ads($id)
    {
      $data=Ads::find($id);
      return view('admin.ads.edit_ads',compact('data'));  
    }
    public function post_edit_ads(Request $request,$id)
    {
    //   $this->validate($request, [
    //   'images' => 'required',
      
    // ]);

    $data = [
      'text' => $request->text,
      'status' => $request->status,
      'link_fb'	=> $request->link_fb,
	  'link_yt'	=> $request->link_yt,
      'layout' => $request->layout,
      'user_id' => Auth::user()->id,
      'updated_at' => date('Y-m-d')
    ];

    $ads_id = Ads::where('id','=',$id)->update($data);
        if($request->hasFile('images')){
          $image = $request->file('images');
          foreach ($request->images as $key => $value) {
            $destinationPath ="Ads/";
            $fileName = $image[$key]->getClientOriginalName();            
            $updload = $image[$key]->move($destinationPath,$fileName);
                 $im_ad = [
                  'ads_id' => $id,
                  'image' => $fileName,
                  'link' => $request->links1[$key]
                 ];

                 DB::table('ads_images')->insert($im_ad);
              }
         }
         
    
      return redirect()->to('adverting')->with('success','Successful Edit');
    }
    public function deleted_imaese($id){
        DB::table('ads_images')->where('id','=',$id)->delete();
        return redirect()->back();
    }
    public function deleted_ads($id)
    {
        $data = Ads::find($id);
        DB::table('ads_images')->where('ads_id','=',$id)->delete();
        $data->delete();
        return redirect()->to('adverting')->with('success','Deleted Successful');
    }
}
