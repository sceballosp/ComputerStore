<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComputerCategory extends Model
{
    /**
     * This is a pivot table for the many to many ralationship between the models Computer and Category
     */
    
    public $timestamps = false;

    protected $table = 'computer_category';

    protected $fillable = ['computer_id', 'category_id'];

    public function getComputerId()
    {
        return $this->attributes['computer_id'];
    }

    public function setComputerId($computer_id)
    {
        $this->attributes['computer_id'] = $computer_id;
    }

    public function getCatageoryId()
    {
        return $this->attributes['category_id'];
    }

    public function setCatageoryId($category_id)
    {
        $this->attributes['category_id'] = $category_id;
    }
}
