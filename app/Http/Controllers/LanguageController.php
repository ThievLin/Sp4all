<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
class LanguageController extends Controller
{
    public function get_index_lang() {
        $lang = Language::get();
        return view('admin.language.index',compact('lang'));
    }
    public function get_create_lang() {
        return view('admin.language.create');
    }
    public function post_create_lang(Request $request) {
        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
            $fileName = "";
        }

        $data = [
            'name' => $request->name,
            'zipcode' => $request->zipcode,
            'code' => $request->code,
            'image' => $fileName,
            'status' => 1,
        ];
        Language::insert($data);
        return redirect()->to('language');
    }
    public function get_edit_lang($id) {
        $lang = Language::find($id);
        return view('admin.language.edit',compact('lang'));
    }
    public function post_edit_lang(Request $request, $id) {
        if($request->hasFile('image')){
            $images = $request->file('image');
            $destinationPath = "images/";
            $fileName = $images->getClientOriginalName();
            $fileupload = $images->move($destinationPath,$fileName);
        }else{
             $fileName ="";
        }
        $data = [
            'name'=>$request->name,
            'zipcode'=>$request->zipcode,
            'code'=>$request->code,
            'image'=>$fileName,
            'status' => 1,
        ];
        Language::where('id',$id)->update($data);
        return redirect()->to('language');
    }
    public function del_lang($id) {
        $del_lang = Language::find($id);
        $del_lang->delete();
        return redirect()->to('language');
    }
}
