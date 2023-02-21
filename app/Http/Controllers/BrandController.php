<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    //index
    public function index (){

        $brands = Brand::latest()->paginate(5);

        return view ('admin.brands.index',compact('brands'));
    }

    public function addBrand(Request $request){
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg.jpeg,png',

        ],
        [
            'brand_name.required' => 'brand name is required',
            'brand_image.min' => 'brand logo/image is required in jpg,jpeg or png format',
        ]);

        // image upload and manipulation
        $brand_image = $request->file('brand_image');

        $gen_name = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $gen_name.'.'.$img_ext;

        // uploading image
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Brand added successfully');

    }

    public function Edit($id) {
        $brands = Brand::find($id);
        return view('admin.brands.edit',compact('brands'));
    }

    public function Update(Request $request, $id) {
        $validateData = $request->validate([
            'brand_name' => 'required|min:4',

        ],
        [
            'brand_name.required' => 'brand name is required'
        ]);

        $old_image = $request->old_image;

        // image upload and manipulation
        $brand_image = $request->file('brand_image');

        if($brand_image){
            $gen_name = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $gen_name.'.'.$img_ext;
            // uploading image
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);
    
            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'updated_at' => Carbon::now()
            ]);
    
            return Redirect()->route('brands')->with('success','Brand updated successfully');
        }else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'updated_at' => Carbon::now()
            ]);

            return Redirect()->route('brands')->with('success','Brand updated successfully');

        }

    }

    public function Delete($id) {
        // Deleting an image from db with the id
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand deleted successfully');

    }
}
