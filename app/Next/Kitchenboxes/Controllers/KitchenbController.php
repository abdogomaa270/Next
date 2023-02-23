<?php

namespace App\Next\Kitchenboxes\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kitchenb;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KitchenbController extends Controller
{   use ImageTrait;
    //1
    public function getall(){
        $data= Kitchenb::all() ;
        return view('photo',compact('data'));
//        return response()->json($data,200) ;
    }
    //2
    public function search($id){
        $box=Kitchenb::find($id);
        if(!$box){
            return response()->json(['status'=>'box Not exist'],Response::HTTP_BAD_REQUEST);
        }
        return $box;
    }
    //3
    public function store(Request $request){

        $box=new Kitchenb();
        $box->id=$request->id;
        $box->name=$request->name;
        $path=$this->uploadOnDisk($request->file('image1'));
        $box->image1=$path;

//        $path2=$this->uploadOnDisk($request->file('image2'));
//        $box->image2=$path2;
//
//        $path3=$this->uploadOnDisk($request->file('image3'));
//        $box->image3=$path3;

        $box->dimentions=$request->dimentions;
        $box->price_conter=$request->price_conter;
        $box->price_mdf=$request->price_mdf;
        $box->type=$request->type;
        $box->save();
        return $box;
    }
    //4
    public function edit(Request $request,$id){

        $box=Kitchenb::find($id);
        if(!$box){
            return response()->json(['status'=>'box Not Found'],Response::HTTP_BAD_REQUEST);
        }

        //code of insert to attribute
        return response()->json(['status'=>'updated successfully'],Response::HTTP_CREATED);
    }
    //5
    public function delete($id){
        $box=Kitchenb::find($id);
        if(!$box){
            return response()->json(['status'=>'box Not exist'],Response::HTTP_BAD_REQUEST);
        }
        $box->delete();
        return response()->json(['status'=>'deleted'],Response::HTTP_CREATED);

    }

}
