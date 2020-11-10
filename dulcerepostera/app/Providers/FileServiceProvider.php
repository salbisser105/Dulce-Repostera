<?php

namespace App\Providers;

use App\Interfaces\FileStorage;
use Illuminate\Support\ServiceProvider;

use App\Interfaces\ImageStorage;
use App\Util\ExcelStorage;
use App\Util\PDFStorage;

class FileServiceProvider extends ServiceProvider{
/**
* Register any application services.
*
* @return void
*/
    public function register(){

        $this->app->bind(FileStorage::class, function ($app, $attributes){
            $select = $attributes["select"];
            if($select == "pdf"){
                return new PDFStorage($attributes);
            } else {
                return new ExcelStorage($attributes);
            }
        });
    }
}