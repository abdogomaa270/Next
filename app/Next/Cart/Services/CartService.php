<?php

namespace App\Next\Cart\Services;

use App\Models\Cart;
use App\Models\Kitchenb;
use Illuminate\Http\Request;

class CartService
{
    public function isexist(Request $request)
    {
        return Cart::where('user_id',$request->user_id)->where('prod_id',$request->prod_id)->first()?1:0;

    }


    public function addItem (Request $request)
    {
        $cart=new Cart();

        $cart->user_id=$request->get('user_id');
        $cart->prod_id=$request->get('prod_id');
        $cart->quantity	=$request->get('quantity');
        $cart->price=$request->get('price') * $request->get('quantity');

        $cart->save();

        return response()->json(['status'=>'added successfully'],200);

     }

    //this function make sure that there will not be a dublicated row for the same product and same user
    public function updateItem(Request $request)
    {
        $cart=Cart::where('user_id',$request->user_id)->where('prod_id',$request->prod_id)->first();
        //update 'pricr' && 'quantity'
        $cart->quantity = $cart->quantity + $request->quantity;
        $cart->price += ($request->quantity * $request->price);
        $cart->save();
//        return $cart;
        return response()->json(['status'=>'updated successfully'],200);
    }


    public function deleteItem(Request $request)
    {
        $cart=Cart::where('user_id',$request->user_id)->where('prod_id',$request->prod_id)->delete();
        return response()->json(['status'=>'deleted successfully'],200);

    }
    public function showSelectedItems($user_id)
    {
        $products=Cart::where('user_id',$user_id)->get();
        // create array and put data into it
        $productsdetails=[];
        foreach ($products as $product)
        {
            $item=Kitchenb::where('id',$product->prod_id)->get();
            $productsdetails=[$item];
        }
        $totalprice=$this->totalPrice($user_id);
        return response()->json(['totla price'=>$totalprice,'cart'=>$products,'Details'=>$productsdetails],200);
    }




    public function totalPrice($id)
    {
        // Get all the products from the cart
        $cartProducts = Cart::where('user_id',$id)->get();
        // Initialize the total price
        $totalPrice = 0;

        // Iterate over each product and add its price to the total
        foreach ($cartProducts as $product) {
            $totalPrice += $product->price ;
        }

//        return response()->json([
//            'status'=>'success',
//            'price'=>$totalPrice
//        ],200);
            return $totalPrice;
    }

    public function clearcart($user_id)
    {
        $status=Cart::where('user_id',$user_id)->delete(); //if cart is empty that mean $status in null

        return $status?response()->json(['status'=>'success'],200):response()->json(['status'=>'cart is empty'],200);
    }


}
