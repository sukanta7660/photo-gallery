<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $table = Album::orderBy('albumID','DESC')->get();
        return view('main')->with(['table'=>$table]);
    }

    public function save_album(Request $request){

        $table = new Album();

        $validate = $request->validate([
            'title' => 'required',
            'imageName' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $table->title = $request->title;

        //image upload
        if ($request->hasFile('imageName')) {

            $extension = $request->imageName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extension;

            $table->imageName = $filename;

            $request->imageName->move('public/uploads/album',$filename);
        }
        $table->save();
        return redirect()->back();
    }
}
