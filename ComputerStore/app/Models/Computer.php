<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Computer extends Model
{
    protected $fillable = ['brand', 'os', 'cpu', 'ram', 'gpu', 'storage'];


    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
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

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
