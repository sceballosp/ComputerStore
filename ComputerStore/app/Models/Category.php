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
     * $this->attributes['description'] - string - contains the category description
     * $this->computers - Computer[] - contains the associated computers
     */

    protected $table = 'categories';

    protected $fillable = ['name', 'description'];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required"
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

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function computers()
    {
        return $this->belongsToMany(Computer::class, 'computer_category');
    }

    public function getComputers()
    {
        return $this->computer;
    }

    public function setComputers($computer)
    {
        $this->computer = $computer;
    }
}
