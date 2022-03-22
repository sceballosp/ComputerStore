<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Computer;

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
        $viewData["subtitle"] = "Order #" . $order["id"] . " - Order information";
        $viewData["order"] = $order;

        return view('order.show')->with("viewData", $viewData);
    }

    public function create(Request $request)
    {
        $computers = Computer::all();
        $computersInOrder = [];
        $ids = $request->session()->get("computers"); //we get the ids of the products stored in session
        if ($ids) {
            foreach ($computers as $key => $computer) {
                if (in_array($key, array_keys($ids))) {
                    $computersInOrder[$key] = $computer;
                }
            }
        }

        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] = "Shopping Cart";
        $viewData["computers"] = $computers;
        $viewData["computersInOrder"] = $computersInOrder;

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

    public function add($id, Request $request)
    {
        $computers = $request->session()->get("computers");
        $computers[$id] = $id;
        $request->session()->put('computers', $computers);

        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('computers');

        return back();
    }
}
