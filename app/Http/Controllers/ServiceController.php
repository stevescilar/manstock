<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Image;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::latest()->paginate(5);
        return view ('admin.services.services', compact('services'));
    }

    public function addService(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:services|min:4',
            'subtitle' => 'required|unique:services|min:4',
            'desc' => 'required|unique:services|min:4',
            'image' => 'required|mimes:jpg,jpeg,png',

        ]);

        $image = $request->file('image');
        $gen_name = hexdec(uniqid()).'.'.$image->getCLientOriginalExtension();
        Image::make($image)->resize(250,250)->save('image/service/'.$gen_name);
        $last_img = 'image/service/'.$gen_name;

        Service::insert([
            'name' => $request->name,
            'subtitle' => $request->subtitle,
            'desc' => $request->desc,
            'image' => $last_img,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->back()->with('success','Service added successfully');


    }
}
