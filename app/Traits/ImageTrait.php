<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageTrait
{
 public function uploadOnDisk($photo){
     //ther are 3 photoes i'm gonna upload
     $image=$photo->getClientOriginalName();
     $path=$photo->storeAs('boxes',$image,'public');
     return $path;
 }
}
