<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Category;
use App\Models\ComputerCategory;

class ComputerController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Computer - Online Store";
        $viewData["subtitle"] = "List of computers";
        $viewData["computers"] = Computer::all();

        return view('computer.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $computer = Computer::findOrFail($id);

        $viewData = [];
        $viewData["title"] = $computer["id"] . " - Online Store";
        $viewData["subtitle"] = "Computer #" . $computer["id"] . " - Computer information";
        $viewData["computer"] = $computer;

        return view('computer.show')->with("viewData", $viewData);
    }

    public function create()
    {
        $categories = Category::get('name');

        $viewData = [];
        $viewData["title"] = "Create computer";
        $viewData["categories"] = $categories;

        return view('computer.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        Computer::validate($request);
        $item = $request->only(["reference", "brand", "os", "cpu", "ram", "gpu", "storage", "description", "price", "quantityAvailable", "categories"]);
        $computer = new Computer();
        $computer->setReference($item["reference"]);
        $computer->setBrand($item["brand"]);
        $computer->setOs($item["os"]);
        $computer->setCpu($item["cpu"]);
        $computer->setRam($item["ram"]);
        $computer->setGpu($item["gpu"]);
        $computer->setStorage($item["storage"]);
        $computer->setDescription($item["description"]);
        $computer->setPrice($item["price"]);
        $computer->setQuantityAvailable($item["quantityAvailable"]);
        $computer->save();

        $computerID = $computer->id;
        foreach ($item["categories"] as $category) {

            $pivot = new ComputerCategory();

            $categoryIDs = Category::where('name', $category)->get('id');

            $pivot->setCatageoryId($categoryIDs[0]->id);
            $pivot->setComputerId($computerID);
            $pivot->save();
        }

        return redirect('/admin');
    }
}
