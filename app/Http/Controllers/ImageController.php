<?php

namespace App\Http\Controllers;
use App\Models\Image;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    
    public function salvarFoto(Request $request){

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $img = $request->image;

            $extension = $img->extension();
            $imageName = md5($img->getClientOriginalName() . strtotime("now")) . "." .$extension;

            $img->move(public_path('/fotos'), $imageName);
        }

        return redirect()->back();


    }
    
}
