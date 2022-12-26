<?php

namespace App\Http\Controllers;

use App\ValueObjects\Cart;
use App\ValueObjects\CartItem;
use App\Models\Product;
use Illuminate\Support\aRR;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;


class CartController extends Controller
{

    /**
     * @return View
     */
    public function index()
    {
        return view('home');
    }

     /**
     * @param  Product  $product
     * @return Json
     */
    public function store(Product $product)
    {
        
        $cart = Session::get('cart', new Cart());
        Session::put('cart', $cart->addItem($product)); 
        return response()->json([
            'status' => 'success'
    ]);
    }
}
