<?php

//Created by: Santiago Albisser

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //attributes id, name, price, created_at, updated_at, user_id
    protected $fillable = ['name', 'description', "user_id"];

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

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($uId)
    {
        $this->attributes['user_id'] = $uId;
    }

    public function comments(){
        return $this->hasMany(PostComment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function validate(){
        return [
            "name" => "required",            
            "description" => "required",
            "user_id" => "required"
        ];
    }

}
