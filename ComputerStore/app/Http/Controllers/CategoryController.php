<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        $viewData = [];
        $viewData["title"] = "Computer - Online Store";
        $viewData["subtitle"] = "Category List";
        $viewData["categories"] = $categories;

        return view('category.create')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);

        $item = $request->only(["name"]);

        $category = new Category();
        $category->setName($item["name"]);


        $category->save();

        return redirect('/categories/create');
    }
}
