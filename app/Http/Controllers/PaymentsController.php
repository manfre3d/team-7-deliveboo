<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plate;
use App\Order;
use Illuminate\Support\Facades\DB;
use Asm89\Stack\CorsService;
use App\User;
use Braintree;
use Illuminate\Support\Facades\Mail;

class PaymentsController extends Controller
{
    public function payment(Request $request)
    {
        // verifico che il prezzo totale sia corretto
        $cartData = json_decode($request['cart_json']);
        $correctPrice = 0;
        foreach ($cartData as $cartItem) 
        {
            $plate = Plate::where('id', $cartItem->id)->first();
            $platePrice = $plate->price;
            $correctPrice += $platePrice * $cartItem->quantity;
        }
        // normalizzo prezzi
        $correctPrice = sprintf("%.2f", $correctPrice);
        $formPrice = sprintf("%.2f", $request['amount']);
        if ( $correctPrice != $formPrice )
        {
            return back()->withErrors('an error occurred: total price did not match');
        }
        

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request["amount"];
        $nonce = $request["payment_method_nonce"];

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) 
        {
            $transaction = $result->transaction;

            // aggiungo ordine in db
            $newOrder = Order::create([
                'user_id' => $cartData[0]->user_id,
                'total_price' => $formPrice,
                'customer_name' => $request['customer_name'],
                'customer_surname' => $request['customer_surname'],
                'customer_email' => $request['customer_email'],
                'customer_phone_number' => $request['customer_phone_number'],
                'customer_address' => $request['customer_address']
            ]);

            // aggiungo i record alla pivot 
            foreach ($cartData as $cartItem) 
            {
                DB::table('order_plate')->insert([
                    'plate_id' => $cartItem->id,
                    'order_id' => $newOrder->id,
                    'quantity' => $cartItem->quantity,
                ]);                
            }

            // prendo il ristorante a cui si sta' facendo un ordine
            $restaurant = User::where('id', $newOrder->user_id)->first();

            // recupero i piatti che sono stati ordinati
            foreach ($cartData as $cartItem) 
            {
                $platesOrdered []= Plate::where('id', $cartItem->id)->first();
            }

            // recupero le email del ristoratore e dell'utente che sta' ordinando
            $emails=[$newOrder->customer_email,$restaurant['email']];
            $emailNames=[$newOrder->customer_name,$restaurant['name']];
            // eseguo un ciclo per inviare tante email, quante ne sono contenute in $emails
            foreach ($emails as $key=>$email){

                Mail::send('emails.orderCreated',compact('newOrder','restaurant','platesOrdered'),
                function($message) use ($email,$emailNames,$key){
                    $message->to(strval($email),strval($emailNames[$key]))
                    ->subject('Order Created Subject');
                });
            }

            // restituisco view avvenuto pagamento
            return view('guest.payment_success');
        } 
        else 
        {
            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('an error occurred: ' .  $result->message);
        }
    }
}
