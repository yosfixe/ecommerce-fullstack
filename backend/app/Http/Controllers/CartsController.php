<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function Cart(Request $request)
    {
       if (!$request->session()->has('login')) {
            return redirect()->route('user.index');
       } 
       $cart = $request->session()->get("cart");
       return view("products.cart")->with(["cart"=>$cart]);
    }

    public function Add2cart(Request $request)
    {
        if (!$request->session()->has('login')) {
            return redirect()->route('user.index');
        }

        $id  = (int) $request->input('id');
        $qte = (int) $request->input('qte');

        $cart = $request->session()->get('cart');

        $found = false;
        foreach ($cart as &$item) {
            if ($item[0] === $id) {
                $item[1] += $qte;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [$id, $qte];
        }
        $request->session()->put('cart', $cart);

       return redirect()->route('products.index');
    }

    public function increase(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        foreach ($cart as &$item) {
            if ($item[0] == $id) {
                $item[1]++;
                break;
            }
        }

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function decrease(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        foreach ($cart as $key => &$item) {
            if ($item[0] == $id) {
                $item[1]--;

                if ($item[1] <= 0) {
                    unset($cart[$key]);
                }
                break;
            }
        }

        $cart = array_values($cart);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }



}
