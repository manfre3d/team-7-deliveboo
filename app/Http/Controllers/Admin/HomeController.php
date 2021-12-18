<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $user = Auth::user();
        
        return view('admin.home', compact('user'));
    }

    public function orderCharts()
    {
        $orders_by_months = [];
        $revenue_by_month = [];

        // inizializzo i 12 mesi
        for ( $i = 0; $i < 12; $i++ )
        {
            $orders_by_months[] = 0;
            $revenue_by_month[] = 0;
        }

        // prendo gli ordini del ristoratore
        $user = Auth::user();
        $orders = $user['orders'];
        
        foreach ($orders as $key => $order) 
        {
            $month = intval( $this->getMonth($order->created_at) );
            // aumento ordini in quel mese
            $orders_by_months[$month - 1]++;
            $revenue_by_month[$month - 1] += $order->total_price;
        }
        $orders_by_months = json_encode($orders_by_months);
        $revenue_by_month = json_encode($revenue_by_month);

        return view('admin.order.charts', compact('orders_by_months', 'revenue_by_month'));
    }

    public function getMonth($date)
    {
        // sample date: 2021-05-07
        $extracted_date = explode("-", $date);
        $_month = $extracted_date[1];

        return $_month;
    }
}
