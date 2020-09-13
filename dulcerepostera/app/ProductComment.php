<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductComment extends Model
{
    
    //attributes id, description, user_id, product_id, created_at, updated_at
    protected $fillable = ['description', 'product_id', 'user_id','rating'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($pId)
    {
        $this->attributes['product_id'] = $pId;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($uId)
    {
        $this->attributes['user_id'] = $uId;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRating($id)
    {
        $this->attributes['rating'] = $id;
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
