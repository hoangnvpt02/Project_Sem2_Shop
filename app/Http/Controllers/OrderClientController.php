<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderClientController extends Controller
{
    public function order() {
        $user = Auth::user();

        $orders = Order::where('user_id', 1)->with('order_details.products')
        ->paginate(10);

        $categories = Category::where('status',1)->take(5)->get();
    
        // dd($orders);

        return view('order', [
            'orders' => $orders,
            'categories' => $categories
        ]);
    }

    public function orderDetail(Request $request) {
        $user = Auth::user();

        $orders = Order::where('user_id', 1)->where('id', $request->id)->with('order_details.products')
        ->paginate(10);

        $categories = Category::where('status', 1)->take(5)->get();

        return view('order_detail', [
            'orders' => $orders,
            'categories' => $categories
        ]);
    }

    public function cancelOrder(Request $request) {
        $result = $this->updateStatusOrder($request);
        if ($result) {
            return redirect()->route('order')->with('success','Hủy đơn hàng thành công');
        }
        return redirect()->route('order')->with('danger','Xảy ra lỗi hãy thử lại');
    }

    public static function updateStatusOrder($request) {
        try {
            Order::where('id', $request->id)->update([
                'status' => 0
            ]);
        } catch (\Throwable $th) {
            Log::error('Order cancel update failed');
            Log::error($th);
            return false;
        }
        return true;
    }

    public function receivedOrder(Request $request) {
        $result = $this->receivedStatusOrder($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Nhận hàng thành công'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xảy ra lỗi xin vui lòng thử lại'
        ]);
    }

    public static function receivedStatusOrder($request) {
        $id = $request->input('id');
        $order = Order::where('id', $id)->first();
        try {
            if ($order) {
                Order::where('id', $id)->update(['status' => 4]);
            }
        } catch (\Exception $err) {
            Log::error('Error updating received order');
            Log::error($err);
            return false;
        }
        return true;
    }
}
