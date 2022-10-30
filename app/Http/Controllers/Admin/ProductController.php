<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function datatables()
    {

        $brands = Product::query();

        return DataTables::of($brands)
            ->addColumn('operations',function ($row){
                return '<a href="'.route("product.edit",$row->id).'" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>'.
                    '<button class="btn btn-danger btn-sm" type="button" onclick="deleteRow(\''.$row->id.'\')">
                                            <i class="fas fa-trash"></i>
                                        </button>';
            })

            ->rawColumns(['operations' => 'operations'])
            ->toJson();
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'sku' => 'required',
            'price' => 'required|integer',
            'details' => 'required'
        ]);
        Product::create($validated);
        toast('Product created successfully','success','top-right');
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'sku' => 'required',
            'price' => 'required|integer',
            'details' => 'required'
        ]);
        $product->update($validated);
        toast('Product updates successfully','success','top-right');
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        if (OrderDetail::where('product_id',$product->id)->count() > 0){
            return response(['message' => 'Product Can\'t be deleted because it\'s related to orders'],400);
        }
        $product->delete();
        return response(['message' => 'Product deleted successfully']);
    }
}
