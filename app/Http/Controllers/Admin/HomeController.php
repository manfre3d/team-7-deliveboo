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

    public function orderCharts($year)
    {
        $orders_by_months = [];
        $revenue_by_month = [];

        // inizializzo i 12 mesi
        for ( $i = 0; $i < 12; $i++ )
        {
            $orders_by_months[] = 0;
            $revenue_by_month[] = 0;
        }

        // prendo gli ordini del ristoratore dell'anno specificato
        $user = Auth::user();
        $orders_selected_yr = Order::whereYear('created_at', $year)->get();
        
        foreach ($orders_selected_yr as $key => $order) 
        {
            $month = intval( $this->getMonth($order->created_at) );
            // aumento ordini in quel mese
            $orders_by_months[$month - 1]++;
            $revenue_by_month[$month - 1] += $order->total_price;
        }
        $orders_by_months = json_encode($orders_by_months);
        $revenue_by_month = json_encode($revenue_by_month);

        // prendi lista anni in cui ci sono dati
        $orders = $user['orders'];
        $list_active_years = [];
        foreach ($orders as $key => $order) 
        {
            $year_of_order = $this->getYear($order->created_at);
            if ( !in_array( $year_of_order, $list_active_years ))
            {
                $list_active_years[] = $year_of_order;
            }
        }

        $selected_year = $year;

        return view('admin.order.charts', compact('orders_by_months', 'revenue_by_month', 'list_active_years', 'selected_year'));
    }

    public function getMonth($date)
    {
        // sample date: 2021-05-07
        $extracted_date = explode("-", $date);
        $_month = $extracted_date[1];

        return $_month;
    }

    public function getYear($date)
    {
        // sample date: 2021-05-07
        $extracted_date = explode("-", $date);
        $_year = $extracted_date[0];

        return $_year;
    }
}
