<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use DeleteModelTrait;
    private $order = Order::class;
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

}
