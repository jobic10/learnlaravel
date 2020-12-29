<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function resizeImage(){
        return view('resizedImage');
    }
    public function resizeImageProcess(Request $request){
        $image = $request->image;
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300,300);
        $image_resize->save(public_path($filename));
        return "Uploaded";
    }
    public function dropZone(Request $request){
        $image = $request->file;
        $name = time().".".$image->extension();
        $image->move(public_path('images'),$name);
        return response()->json([
            'success' => $name
        ]);
    }
}
