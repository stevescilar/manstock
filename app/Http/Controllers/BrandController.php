<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //index
    public function index (){

        $brands = Brand::latest()->paginate(5);

        return view ('admin.brands.index',compact('brands'));
    }
}
