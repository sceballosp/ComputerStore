<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Order - Online Store";
        $viewData["subtitle"] = "List of orders";
        $viewData["orders"] = Order::all();

        return view('order.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $order = Order::findOrFail($id);
        $viewData["title"] = $order["id"] . " - Online Store";
        $viewData["subtitle"] = "Order #".$order["id"] . " - Order information";
        $viewData["order"] = $order;

        return view('order.show')->with("viewData", $viewData);
    }

    public function create()
    {
        $viewData = [];
        $viewData["title"] = "Create order";

        return view('order.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        Order::validate($request);        
        $item = $request->only(["amount", "address", "sent", "canceled", "paid"]);
        $order = new Order();
        $order->setAmount($item["amount"]);
        $order->setAddress($item["address"]);
        $order->setSent($item["sent"]);
        $order->setCanceled($item["canceled"]);
        $order->setPaid($item["paid"]);
        $order->save();

        return redirect('/');
    }
}
