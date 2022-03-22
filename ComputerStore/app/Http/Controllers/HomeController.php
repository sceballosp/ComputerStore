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

}
