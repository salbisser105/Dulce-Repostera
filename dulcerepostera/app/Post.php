<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name', 'description'];

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

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
