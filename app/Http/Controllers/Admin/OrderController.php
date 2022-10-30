<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function datatables()
    {

        $orders = Order::query();

        return DataTables::of($orders)
            ->addColumn('operations',function ($row){
                return '<a href="'.route("orders.show",$row->id).'" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>';
            })

            ->rawColumns(['operations' => 'operations'])
            ->toJson();
    }

    public function show($id)
    {
        $order = Order::with('items')->find($id);
        $statuses = OrderStatus::get()->skip(1);
        return view('orders.show',compact('order','statuses'));
    }


    public function update(Request $request, Order $order)
    {
        $validated = $request->validate(['order_status_id' => 'required|exists:order_statuses,id|not_in:1']);
        $order->update($validated);
        toast('Order Status updates successfully','success','top-right');
        return redirect()->route('orders.index');
    }
}
