<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandSelect2Resource;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    public function index()
    {
        return view('brands.index');
    }

    public function datatables()
    {

        $brands = Brand::query();

        return DataTables::of($brands)
            ->addColumn('operations',function ($row){
                return '<a href="'.route("brand.edit",$row->id).'" class="btn btn-success btn-sm">
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
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);
        Brand::create($validated);
        toast('Brand created successfully','success','top-right');
        return redirect()->route('brand.index');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit',compact('brand'));
    }
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate(['name' => 'required']);
        $brand->update($validated);
        toast('Brand updates successfully','success','top-right');
        return redirect()->route('brand.index');
    }

    public function destroy(Brand $brand)
    {
        if (Product::where('brand_id',$brand->id)->count() > 0){
            return response(['message' => 'Brand Can\'t be deleted because it\'s related to products'],400);
        }
        $brand->delete();
        return response(['message' => 'brand deleted successfully']);
    }

    public function getBrands(Request $request)
    {
        if ($request->get('search')) {
            $brands = Brand::where('name', 'like', '%' . $request->get('search') . '%')
                ->get();

            return response()->json([
                BrandSelect2Resource::collection($brands),
            ]);
        }
        return [];
    }

}
