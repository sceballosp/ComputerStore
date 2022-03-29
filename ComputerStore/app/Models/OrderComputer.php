<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderComputer extends Model
{
    /**
     * ORDERCOMPUTER ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['price'] - int - contains the item price
     * $this->attributes['order_id'] - int - contains the referenced order id
     * $this->attributes['computer_id'] - int - contains the referenced computer id
     * $this->attributes['created_at'] - timestamp - contains the item creation date
     * $this->attributes['updated_at'] - timestamp - contains the item update date
     * $this->order - Order - contains the associated Order
     * $this->computer - Computer - contains the associated Computer
     */

    protected $table = 'order_computer';

    protected $fillable = ['price', 'quantity'];

    public static function validate($request)
    {
        $request->validate([
            "price" => "required",
            "quantity" => "required",
            "computer_id" => "required|exists:computers,id",
            "order_id" => "required|exists:orders,id",
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($orderId)
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getComputerId()
    {
        return $this->attributes['computer_id'];
    }

    public function setComputerId($computerId)
    {
        $this->attributes['computer_id'] = $computerId;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
    
    public function getComputer()
    {
        return $this->computer;
    }

    public function setComputer($computer)
    {
        $this->computer = $computer;
    }
}
