<?php

namespace App\Http\Controllers;

use App\Album;
use App\Gallery;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $table = Album::orderBy('albumID','DESC')->get();
        $count = Album::count();
        return view('main')->with(['count'=>$count, 'table'=>$table]);
    }

    //for album

    public function save_album(Request $request){

        $table = new Album();

        $validate = $request->validate([
            'title' => 'required | unique:albums,title',
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
        return redirect()->back()->with('msg','Album Created Successfully');
    }

    // ajax show
    public function allAlbums(){
        $table = Album::orderBy('title', 'ASC')->get();
        $data=[];
        foreach ($table as $row){
            $rowData['albumID'] = $row->albumID;
            $rowData['title'] = $row->title;
            $rowData['imageName'] = $row->imageName;
            $rowData['created_at'] = $row->created_at->format('F j, Y');
            $data[] = $rowData;
        }

        return response()->json($data);
    }

    //search
    public function albumSearch(Request $request){
        $search = $request->search;
        $table = Album::orderBy('title', 'ASC')->search($search)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['albumID'] = $row->albumID;
            $rowData['title'] = $row->title;
            $rowData['imageName'] = $row->imageName;
            $rowData['created_at'] = $row->created_at->format('F j, Y');
            $data[] = $rowData;
        }
        return response()->json($data);
    }

    //for gallery
    public function image_upload(Request $request){

        $validate = $request->validate([
            'albumID' => 'required',
        ]);

        if ($request->hasFile('images')){

            $images_array = $request->file('images');
            $array_len = count($images_array);

            for ($i=0; $i<$array_len; $i++){
                $extension = $images_array[$i]->extension();
                $filename = rand(123456,999999).'.'.$extension;
                $path = public_path('uploads/gallery');
                $images_array[$i]->move($path,$filename);

                $table = new Gallery();
                $table->albumID = $request->albumID;
                $table->images  = $filename;
                $table->save();

            }

            return redirect()->back();

        }

    }

    // gallery page
    public function gallery_page(Request $request){
        $album = Album::find($request->id);
        $table = Gallery::orderBy('galleryID','DESC')->where('albumID',$request->id)->get();
        $count = Gallery::where('albumID',$request->id)->count();
        return view('gallery_page')->with(['table'=>$table,'album'=>$album,'count'=>$count]);
    }
}
