<?php

//Created by: Ricardo Saldarriaga

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user' ,'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getRole(){
        return $this->attributes['role'];
    }

    public function getName(){
        return $this->attributes['name'];
    }

    public function setName($name){
        $this->attributes['name'] = $name;
    }

    public function getUser(){
        return $this->attributes['user'];
    }

    public function setUser($user){
        $this->attributes['user'] = $user;
    }

    public function getEmail(){
        return $this->attributes['email'];
    }

    public function setEmail($email){
        $this->attributes['email'] = $email;
    }

    public function getPassword(){
        return $this->attributes['password'];
    }

    public function setPassword($password){
        $this->attributes['password'] = $password;
    }

    public function comments(){
        return $this->hasMany(ProductComment::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function favoritePosts(){
        return $this->hasMany(FavPosts::class);
    }

    public function wishList(){
        return $this->hasMany(WishList::class);
    }

    public static function validate(){
        return [
            'user' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }

}
