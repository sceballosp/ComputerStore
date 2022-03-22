<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Computer;

class Category extends Model
{
    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['name'] - string - contains the category name
     * $this->computers - Computer[] - contains the associated computers
     */

    protected $table = 'categories';

    protected $fillable = ['name'];


    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }


    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function computers()
    {
        return $this->belongsToMany(Computer::class, 'computer_category');
    }
}
