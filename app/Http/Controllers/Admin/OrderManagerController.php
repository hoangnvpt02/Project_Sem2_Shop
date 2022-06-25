<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        $orders = Order::where('user_id', 1)->where('id', $request->id)->with('order_details.products.products_images')->with('users')
        ->paginate(10);

        return view('admin.order.detail', [
            'orders' => $orders
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->cancelOrder($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Hủy đơn hàng thành công'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xảy ra lỗi xin vui lòng thử lại'
        ]);
    }

    public function updateConfirmOrder(Request $request) {
        $result = $this->confirmOrder($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Xác nhận đơn hàng thành công'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xảy ra lỗi xin vui lòng thử lại'
        ]);
    }

    public function updateShipOrder(Request $request) {
        $result = $this->shipOrder($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Xác nhận đơn hàng thành công'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xảy ra lỗi xin vui lòng thử lại'
        ]);
    }

    public function updateCancelOrder(Request $request) {
        $result = $this->cancelOrder($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Xác nhận đơn hàng thành công'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xảy ra lỗi xin vui lòng thử lại'
        ]);
    }

    public static function deleteOrder($request) {
        $id = $request->input('id');
        $order = Order::where('id', $id)->first();

        if ($order) {
            Order_detail::where('order_id', $id)->delete();
            return Order::where('id', $id)->delete();
        }
        return false;
    }

    public static function confirmOrder($request) {
        $id = $request->input('id');
        $order = Order::where('id', $id)->first();
        try {
            if ($order) {
                Order::where('id', $id)->update(['status' => 2]);
            }
        } catch (\Exception $err) {
            dd($err);
            Log::error('Error updating confirm order');
            Log::error($err);
        }
        return true;
    }

    public static function shipOrder($request) {
        $id = $request->input('id');
        $order = Order::where('id', $id)->first();
        try {
            if ($order) {
                Order::where('id', $id)->update(['status' => 3]);
            }
        } catch (\Exception $err) {
            Log::error('Error updating ship order');
            Log::error($err);
            return false;
        }
        return true;
    }

    public static function cancelOrder($request) {
        $id = $request->input('id');
        $order = Order::where('id', $id)->first();
        try {
            if ($order) {
                Order::where('id', $id)->update(['status' => 0]);
            }
        } catch (\Exception $err) {
            Log::error('Error updating ship order');
            Log::error($err);
            return false;
        }
        return true;
    }
}
