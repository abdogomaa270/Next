<?php

namespace App\Next\Cart\Controllers;

use App\Http\Controllers\Controller;
use App\Next\Cart\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }





    public function modifycart (Request $request)
    {
          if ($this->cartService->isexist($request))
          {
             return $this->cartService->updateItem($request);
          }

              return $this->cartService->addItem($request);



    }
    public function showSelectedItems($user_id)
    {
       return $this->cartService->showSelectedItems($user_id);
    }

    public function totalPrice($user_id)
    {
       return $this->cartService->totalPrice($user_id);
    }

    public function clearcart($user_id)
    {
      return $this->cartService->clearcart($user_id);
    }


}
