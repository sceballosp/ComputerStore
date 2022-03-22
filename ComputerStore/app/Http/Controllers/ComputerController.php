<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\ComputerCategory;

class ComputerController extends Controller
{
    public function form()
    {
        return view('computer.form');
    }

    public function index()
    {
        $computers = Computer::all();

        $viewData = [];
        $viewData["title"] = "Computer - Online Store";
        $viewData["subtitle"] = "Computer List";
        $viewData["computers"] = $computers;

        return view('computer.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $computer = Computer::findOrFail($id);

        $viewData = [];
        $viewData["title"] = "Computer - Online Store";
        $viewData["subtitle"] = "Computer Details";
        $viewData["computer"] = $computer;

        return view('computer.show')->with("viewData", $viewData);
    }

    public function create()
    {
        $categories = Category::get('name');

        $viewData = [];
        $viewData["title"] = "Computer - Online Store";
        $viewData["subtitle"] = "Computer Details";
        $viewData["categories"] = $categories;

        return view('computer.create')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "brand" => "required",
            "os" => "required",
            "cpu" => "required",
            "ram" => "required",
            "gpu" => "required",
            "storage" => "required",
            "categories" => "required"
        ]);

        $item = $request->only(["brand", "os", "cpu", "ram", "gpu", "storage", "categories"]);

        $computer = new Computer();
        $computer->setBrand($item["brand"]);
        $computer->setOs($item["os"]);
        $computer->setCpu($item["cpu"]);
        $computer->setRam($item["ram"]);
        $computer->setGpu($item["gpu"]);
        $computer->setStorage($item["storage"]);
        $computer->save();

        $computerID = $computer->id;
        foreach ($item["categories"] as $category) {

            $pivot = new ComputerCategory();

            $categoryIDs = Category::where('name', $category)->get('id');

            $pivot->setCatageoryId($categoryIDs[0]->id);
            $pivot->setComputerId($computerID);
            $pivot->save();
        }

        return redirect('/')->with('mssg', 'Elemento creado satisfactoriamente');
    }

    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();

        return redirect('/computers');
    }
}
