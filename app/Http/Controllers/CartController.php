<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart($product_id)
    {
        $this->cartService->addToCart($product_id);
        toast('product added successfully','success','top-right');
        return redirect()->route('cart');
    }

    public function getCartItems()
    {
        $items = $this->cartService->getCartItems();
        return view('front.cart',compact('items'));
    }

    public function deleteCartItem($cartItemId)
    {
        $this->cartService->deleteCartItem($cartItemId);
        toast('product deleted successfully','success','top-right');
        return redirect()->route('cart');
    }


}
