<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orders= $user['orders'];
        
        return view('admin.order.index', compact('orders'));
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
    public function show(Order $order)
    {   
        if( $order->user_id != Auth::id() ) {
            abort("403");
        }

        // prendi il numero dell'ordine 
        $restaurant_id = $order->user_id;
        $orders_list = Order::where('user_id', $restaurant_id)->get();

        $order_number = null;
        foreach ($orders_list as $key => $_order) 
        {
            if ( $_order->id == $order->id ) 
            {
                $order_number = $key + 1;
            }
        }


        $platesOrdered=[];
        foreach ($order->plates as $plate) 
        {   
            $platesOrdered[]=[
                'plate'=>$plate,
                'quantity'=>$plate->pivot['quantity']
            ];
        }
        

        return view('admin.order.show', compact('platesOrdered','order', 'order_number'));
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
