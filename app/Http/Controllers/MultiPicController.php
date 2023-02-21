<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultiPic;
use Image;
use Illuminate\Support\Carbon;



class MultiPicController extends Controller
{
    public function index () {
        $images = MultiPic::all();

        return view ('admin.gallery.index',compact('images'));
    }

    public function addImage(Request $request){
        // $validateData = $request->validate([
            
        //     // 'image' => 'required|mimes:jpg,jpeg,png',
        //     'image' => 'required|array|max:5|mimes:jpeg,jpg,png',

        // ],
        // [
        //   //
        // ]);

        // image upload and manipulation
        $image= $request->file('image');

        foreach($image as $multi_pic){
            // Generating image - using image intervention
            $gen_name = hexdec(uniqid()).'.'.$multi_pic->getClientOriginalExtension();
            Image::make($multi_pic)->resize(300,300)->save('image/gallery/'.$gen_name);
            $last_img = 'image/gallery/'.$gen_name;

            MultiPic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }
        return Redirect()->back()->with('success','images added successfully');
    }
}
 