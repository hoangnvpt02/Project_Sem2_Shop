<?php

namespace App\Http\Controllers;

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
    
        // dd($orders);

        return view('order', [
            'orders' => $orders
        ]);
    }

    public function orderDetail(Request $request) {
        $user = Auth::user();

        $orders = Order::where('user_id', 1)->where('id', $request->id)->with('order_details.products')
        ->paginate(10);

        return view('order_detail', [
            'orders' => $orders
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
}
