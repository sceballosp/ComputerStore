<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Computer extends Model
{
    /**
     * COMPUTER ATTRIBUTES
     * $this->attributes['id'] - int - contains the computer primary key (id)
     * $this->attributes['reference'] - string - contains the computer reference
     * $this->attributes['brand'] - string - contains the computer brand
     * $this->attributes['os'] - string - contains the computer operating system
     * $this->attributes['cpu'] - string - contains the computer procesor
     * $this->attributes['ram'] - int - contains the computer RAM
     * $this->attributes['gpu'] - string - contains the computer graphics card
     * $this->attributes['storage'] - int - contains the computer storage
     * $this->attributes['description'] - int - contains the computer description
     * $this->attributes['quantityAvailable'] - int - contains the quantity available of the computer in the store
     * $this->categories - Category[] - contains the associated categories
     */

    protected $fillable = ['reference', 'brand', 'os', 'cpu', 'ram', 'gpu', 'storage', 'description', 'price', 'quantityAvailable'];
    
    public static function validate($request)
    {
        $request->validate([
            "reference" => "required",
            "brand" => "required",
            "os" => "required",
            "cpu" => "required",
            "ram" => "required",
            "gpu" => "required",
            "storage" => "required",
            "description" => "required",
            "price" => "required",
            "quantityAvailable" => "required",
            "categories" => "required"
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

    public function getReference()
    {
        return $this->attributes['reference'];
    }

    public function setReference($reference)
    {
        $this->attributes['reference'] = $reference;
    }

    public function getBrand()
    {
        return $this->attributes['brand'];
    }

    public function setBrand($brand)
    {
        $this->attributes['brand'] = $brand;
    }

    public function getOs()
    {
        return $this->attributes['os'];
    }

    public function setOs($os)
    {
        $this->attributes['os'] = $os;
    }


    public function getCpu()
    {
        return $this->attributes['cpu'];
    }

    public function setCpu($cpu)
    {
        $this->attributes['cpu'] = $cpu;
    }

    public function getRam()
    {
        return $this->attributes['ram'];
    }

    public function setRam($ram)
    {
        $this->attributes['ram'] = $ram;
    }

    public function getGpu()
    {
        return $this->attributes['gpu'];
    }

    public function setGpu($gpu)
    {
        $this->attributes['gpu'] = $gpu;
    }

    public function getStorage()
    {
        return $this->attributes['storage'];
    }

    public function setStorage($storage)
    {
        $this->attributes['storage'] = $storage;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getQuantityAvailable()
    {
        return $this->attributes['quantityAvailable'];
    }

    public function setQuantityAvailable($quantityAvailable)
    {
        $this->attributes['quantityAvailable'] = $quantityAvailable;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'computer_category');
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_computer');
    }

    public function getOrders()
    {
        return $this->orders;
    }

    public function setOrders($orders)
    {
        $this->orders = $orders;
    }
}
