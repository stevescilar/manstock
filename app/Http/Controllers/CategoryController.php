<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;


class CategoryController extends Controller
{
    // protect access
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index',compact('categories','trashCat'));
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

    public function softDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Is temporally Deleted');

    }

    public function Restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category has been restored');

    }
    public function cleanDelete($id){
        $clearTrash = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category has been been permanently deleted');
    }
}
