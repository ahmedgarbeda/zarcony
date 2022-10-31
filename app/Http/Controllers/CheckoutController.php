<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Services\CartService;
use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(CartService $cartService, CheckoutService $checkoutService)
    {
        $this->cartService = $cartService;
        $this->checkoutService = $checkoutService;
    }

    public function checkout()
    {
        $items = $this->cartService->getCartItems();
        return view('front.checkout',compact('items'));
    }


    public function doCheckout(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'payment_method' => 'required'
        ]);

        $message = $this->checkoutService->checkout($validated);
        toast($message,'success','top-right');

        return redirect('/');

    }
}
