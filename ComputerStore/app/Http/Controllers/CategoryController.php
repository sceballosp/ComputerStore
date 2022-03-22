<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{

    public function create()
    {
        $viewData = [];
        $viewData["title"] = "Category - Online Store";
        $viewData["subtitle"] = "List of categories";
        $viewData["categories"] = Category::all();
        
        return view('category.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        Category::validate($request);       
        $item = $request->only(["name", "description"]);
        $category = new Category();
        $category->setName($item["name"]);
        $category->setDescription($item["description"]);
        $category->save();

        return redirect('/categories/create');
    }
}
