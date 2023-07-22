<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubCategoryController extends Controller
{
    public function AllSubCategory(){
        $subcategories = SubCategory::latest()->get();
        return view('category',compact('subcategories'));
    }

    public function AddSubCategory(){
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('category',compact('categories'));
    }


    public function StoreSubCategory(Request $request){

        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = strtolower(str_replace(' ', '-',$request->subcategory_name));
        $subcategory->save();
        return back();
    }

    public function GetSubCategory($category_id){
        Log::info('categ'.$category_id);
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        Log::info("sub category me kya aa rha hai".$subcat);
        return json_encode($subcat);
    }
}
