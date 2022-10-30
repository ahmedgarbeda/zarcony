<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::count();
        $products = Product::count();
        $orders = OrderStatus::with('orders')->get();
        return view('index',compact('brands','products','orders'));
    }
}
