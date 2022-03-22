<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $viewData["title"] = "Admin - Online Store";
        $viewData["subtitle"] = "Admin home";

        return view('admin.index')->with("viewData", $viewData);
    }

}
