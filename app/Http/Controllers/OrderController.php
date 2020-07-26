<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct() {
        $this->middleware('auth', ['except' => [
            'store'
        ]]);
		
		$this->middleware('cors');
    }
	
	
    public function index()
    {
        $orders = Order::with(["pizzas"]);
        return view('admin.orders.index', compact('orders'));
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
		$request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone" => "required",
            "address" => "required|string",
            "city" => "required|string",
        ]);
		
		
        $order = Order::create($request->except("order_items"));
        if (!$order) {
            return response()->json(["success" => false, "message" => "Something went wrong while creating order"]);
        }
        $orderItems = json_decode($request->get("order_items"));
   
        $total = 0;
        foreach ($orderItems as $o) {
            array_push($data, ["pizza_id" => $o->pizza_id, "order_id" => $order->id, "amount" => $o->amount]);
			
			$order->pizzas()->attach($o->pizza_id, ['amount_order' => $o->amount]);
			
            $product = Pizza::find($o->pizza_id);
            $product->amount = (int)$product->amount - (int)$o->amount;
            $product->save();
            $price = (double)$product->price;
            $price_total = $price * $o->amount;
			$total += $price_total;
            
        }
        
		$order->total_price = $total;
		$order->save();

        
        return response()->json(["success" => true, "order" => $order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order= Order::findOrFail($id)->with(["items"]);
		return view('admin.show.index', compact('order'));
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect(route('order.index'));
    }
}
