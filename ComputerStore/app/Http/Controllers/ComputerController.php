<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function form()
    {
        return view('computer.form');
    }

    public function index()
    {
        $computers = Computer::orderBy('id', 'DESC')->get();

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

        return view('computer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "brand" => "required",
            "os" => "required",
            "cpu" => "required",
            "ram" => "required",
            "gpu" => "required",
            "storage" => "required"
        ]);

        $item = $request->only(["brand", "os", "cpu", "ram", "gpu", "storage"]);

        $computer = new Computer();
        $computer->setBrand($item["brand"]);
        $computer->setOs($item["os"]);
        $computer->setCpu($item["cpu"]);
        $computer->setRam($item["ram"]);
        $computer->setGpu($item["gpu"]);
        $computer->setStorage($item["storage"]);

        $computer->save();

        return redirect('/')->with('mssg', 'Elemento creado satisfactoriamente');
    }

    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();

        return redirect('/computers');
    }
}
