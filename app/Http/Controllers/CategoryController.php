<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;


class CategoryController extends Controller
{
    public function index() {
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function addCat(Request $request) {
        // add validation
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id, 
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category Inserted Successfully');
    }  
    
    public function Edit($id){
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    public function Update(Request $request, $id) {
        $update = Category::find($id)->update([
            'category_name' =>$request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('category')->with('success','Category Updated Successfully');

    }
}
