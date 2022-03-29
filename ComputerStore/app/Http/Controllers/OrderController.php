<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Computer;
use App\Models\OrderComputer;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{

    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Orders - Online Store";
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
        $total = 0;
        $computersInOrder = [];
        $computersInSession = $request->session()->get("computers"); //we get the ids of the products stored in session
        if ($computersInSession) {
            $computersInOrder = Computer::findMany(array_keys($computersInSession));
            $total = Computer::sumPricesByQuantities($computersInOrder, $computersInSession);
        }

        $viewData = [];
        $viewData["title"] = "Order - Online Store";
        $viewData["subtitle"] = "Shopping Cart";
        $viewData["computers"] = $computersInOrder;
        $viewData["total"] = $total;

        return view('order.create')->with("viewData", $viewData);
    }


    public function save(Request $request)
    {
        $computersInSession = $request->session()->get("computers");
        if ($computersInSession) {
            //$user = Auth::user();
            $order = new Order();
            //$order->setUser($user);
            $order->setAddress("dirección");
            $order->setAmount(0);
            $order->setSent(0);
            $order->setCanceled(0);
            $order->setPaid(0);
            $order->save();

            $total = 0;
            $computersInOrder = Computer::findMany(array_keys($computersInSession));
            foreach ($computersInOrder as $computer) {
                $quantity = $computersInSession[$computer->getId()];
                $item = new OrderComputer();
                $item->setQuantity($quantity);
                $item->setPrice($computer->getPrice());
                $item->setComputerId($computer->getId());
                $item->setComputerId($computer->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($computer->getPrice() * $quantity);
            }
            $order->setAmount($total);
            $order->save();

            $request->session()->forget('computers');
            return back();
        } else {
            return redirect()->route('order.index');
        }
    }

    public function add(Request $request, $id)
    {
        $computers = $request->session()->get("computers");
        $computers[$id] = $request->input('quantity');
        $request->session()->put('computers', $computers);

        return redirect()->route('computer.index');
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('computers');

        return back();
    }
}
