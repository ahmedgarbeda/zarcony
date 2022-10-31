<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function products(Request $request)
    {
        $products = Product::select('id','title','price')->paginate(24);
        return view('front.products',compact('products'));
    }

    public function brands()
    {
        $brands = Brand::select('id','name')->paginate(24);
        return view('front.brands',compact('brands'));
    }

    public function brandProducts($brand_id){
        $brand = Brand::find($brand_id);
        $products = Product::where('brand_id',$brand_id)->select('id','title','price')->paginate(24);
        return view('front.brand-products',compact('products','brand'));
    }

    public function productDetails($product_id)
    {
        $product = Product::find($product_id);
        $relatedProducts = Product::where('brand_id',$product->brand_id)->get();
        return view('front.product-details',compact('product','relatedProducts'));
    }
}
