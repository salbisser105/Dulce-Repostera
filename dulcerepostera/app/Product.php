<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name','price','category','description','ingredients'];

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

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category)
    {
        $this->attributes['category'] = $category;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getIngredients()
    {
        return $this->attributes['ingredients'];
    }

    public function setIngredientes($ingredients)
    {
        $this->attributes['price'] = $ingredients;
    }

    public function comments(){
        return $this->hasMany(ProductComment::class);
    }
    
}