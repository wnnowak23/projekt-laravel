<?php

namespace App\Http\Controllers;

use App\ValueObjects\Cart;
use App\ValueObjects\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Exception;


class CartController extends Controller
{

    /**
     * @return View
     */
    public function index()
    {
        //dd(Session::get('cart', new Cart()));
        //return view('home');
        return view('cart.index', [
            'cart' => Session::get('cart', new Cart())
            
        ]);
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


    public function destroy(Product $product)
    {
        try {
            $cart = Session::get('cart', new Cart());
            Session::put('cart', $cart->removeItem($product));
            Session::flash('status', __('shop.product.status.delete.success'));
            return response()->json([
                'status' => 'success'
            ]);
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd!'

            ])->setStatusCode(500);
        }
    
    }
}
