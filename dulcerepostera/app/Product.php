<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name','price','category','description','image','ingredients'];

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

    public function setIngredients($ingredients)
    {
        $this->attributes['price'] = $ingredients;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public static function validate($request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0",
            "category" => "required",
            "description" => "required",
            "ingredients" => "required"
        ]);
    }

    public function comments(){
        return $this->hasMany(ProductComment::class);
    }
    
}