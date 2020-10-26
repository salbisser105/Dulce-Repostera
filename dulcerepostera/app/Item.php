<?php

//Created by: Santiago Albisser

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Order;
class Item extends Model
{

    //attributes id, product_id, order_id, quantity created_at, updated_at

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getQuantity(){
        return $this->attributes['quantity'];
    }

    public function setQuantity($q){
        $this->attributes['quantity'] = $q;
    }

    public function getProductId(){
        return $this->attributes['product_id'];
    }

    public function setProductId($id){
        $this->attributes['product_id'] = $id;
    }

    public function getOrderId(){
        return $this->attributes['order_id'];
    }

    public function setOrderId($id){
        $this->attributes['order_id'] = $id;
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
