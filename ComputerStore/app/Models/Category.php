<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Computer;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['category'];


    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }


    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category)
    {
        $this->attributes['category'] = $category;
    }

    public function computers()
    {
        return $this->belongsTo(Computer::class);
    }
}
