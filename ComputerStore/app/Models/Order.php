<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['amount'] - float - contains the order price
     * $this->attributes['addreess'] - string - contains the address where the order will be delivered
     * $this->attributes['sent'] - boolean - contains true if the order was sent or false if not
     * $this->attributes['canceled'] - boolean - contains true if the order was canceled by the user or false if not
     * $this->attributes['paid'] - boolean - contains true if the order was already paid or false if not
     * $this->user - User - contains the associated user
     * $this->computers - Computer[] - contains the associated computers
     */

    public static function validate($request)
    {
        $request->validate([
            "amount" => "required",
            "address" => "required",
            "sent" => "required",
            "canceled" => "required",
            "paid" => "required"
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

    public function getAmount()
    {
        return $this->attributes['amount'];
    }

    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }

    public function getAddress()
    {
        return $this->attributes['address'];
    }

    public function setName($address)
    {
        $this->attributes['address'] = $address;
    }

    public function getSent()
    {
        return $this->attributes['sent'];
    }

    public function setSent($sent)
    {
        $this->attributes['sent'] = $sent;
    }

    public function getCanceled()
    {
        return $this->attributes['canceled'];
    }

    public function setCanceled($canceled)
    {
        $this->attributes['canceled'] = $canceled;
    }

    public function getPaid()
    {
        return $this->attributes['paid'];
    }

    public function setPaid($paid)
    {
        $this->attributes['paid'] = $paid;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function computers()
    {
        return $this->belongsToMany(Computer::class, 'order_computer');
    }
}
