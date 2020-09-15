<?php

//Created by: Ricardo Saldarriaga

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostComment extends Model
{
    
    //attributes id, description, user_id, post_id, created_at, updated_at
    protected $fillable = ['description', 'post_id', 'user_id'];

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

    public function getPostId()
    {
        return $this->attributes['post_id'];
    }

    public function setPostId($pId)
    {
        $this->attributes['post_id'] = $pId;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($uId)
    {
        $this->attributes['user_id'] = $uId;
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
