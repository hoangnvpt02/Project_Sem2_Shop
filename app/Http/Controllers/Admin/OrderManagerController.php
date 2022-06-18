<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagerController extends Controller
{
    use DeleteModelTrait;
    private $order = Order::class;
    public function index()
    {
        $orders = Order::with('users')->with('order_details')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function orderDetail(Request $request) {
        $user = Auth::user();

        $orders = Order::where('user_id', 1)->where('id', $request->id)->with('order_details.products')->with('users')
        ->paginate(10);

        return view('admin.order.detail', [
            'orders' => $orders
        ]);
    }
}
