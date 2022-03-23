<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData["title"] = "Home - Online Store";
        $viewData["subtitle"] = "Home";

        return view('home.index')->with("viewData", $viewData);
    }

    public function menu()
    {
        $viewData["title"] = "Menu - Online Store";
        $viewData["subtitle"] = "Menu";

        return view('home.menu')->with("viewData", $viewData);
    }

}
