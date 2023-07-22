<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(){
        return view('category');
    }
    public function StoreCategory(Request $request){
        $category = new Category();
        $category->category_name = $request->category;
        $category->category_slug = strtolower(str_replace(' ', '-', $request->category));
        $category->save();
        return back();
    }
}
