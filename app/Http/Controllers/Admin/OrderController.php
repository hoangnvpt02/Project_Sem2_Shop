<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;

class OrderController extends Controller
{
    private $pro = Product::class;

    public function showCartModal(Request $request) {
        $prd_id = $request->input("prd_id");

        $product = Product::find($prd_id);
        
        return view('modal.showCartModal', compact('product'));
        // return view('modal.showCartModal', compact('product'));
    }

    public function addToCart(Request $request) {
        $prd_id = $request->input("prd_id");

        $product = Product::find($prd_id);
        
        return $product;
    }

    public function showCheckout() {
        $categories = Category::where('status',1)->take(5)->get();

        return view('checkout', compact("categories"));
    }

    public function doCheckout(Request $request) {
        $info = $request->input("checkout_info");

        Order::create([
            'note'=> $info["order_note"],
            'status'=> 0,
            'user_id'=> 1,
            'infomation_user_id'=> 1,
        ]);

        // $data_cart = json_decode($info["data_cart"], true);

        $data_cart = $info["data_cart"];

        // return array_values($data_cart)[0]["id"];

        for ($i = 0; $i < count($data_cart); $i++) {
            Order_detail::create([
                'quantity'=> array_values($data_cart)[$i]["qty"],
                'price' => array_values($data_cart)[$i]["price"],
                'product_id' => array_values($data_cart)[$i]["id"],
                'infomation_user_id' => 1,
                'discounts_code_id' => 1,
                'status'=> 0,
            ]);
        }

        // $product = Product::find($prd_id);
        
        return '{"alert": true, "message": "Order Thành công !"}';
        // return view('modal.showCartModal', compact('product'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
