<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\Braintree_Configuration;
use Braintree;

class PageController extends Controller
{
    public function index()
    {
        return view('guest.front');
    }

    public function checkout()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();
        
        return view('guest.checkout', compact('token'));
    }
}
