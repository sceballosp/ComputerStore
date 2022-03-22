<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderComputer extends Model
{
    /**
     * This is a pivot table for the many to many ralationship between the models Computer and Category
     */

    public $timestamps = false;

    protected $table = 'order_computer';

    protected $fillable = ['orders_id', 'computer_id'];

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {
        $this->attributes['order_id'] = $order_id;
    }

    public function getComputerId()
    {
        return $this->attributes['computer_id'];
    }

    public function setComputerId($computer_id)
    {
        $this->attributes['computer_id'] = $computer_id;
    }
}
