<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Carts;
use App\Models\Orders;
use App\Models\Payments;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    
   public function index() {
    
    $order = Session::get('order', []);
    $currency=Session::get('currency');
   
    return view('client.payment.app',compact('order'));
   }
 
   public function redirectToPayLink(Request $request){ 
       

        try {  
             $order = Session::get('order', []);
              
            $currency=Session::get('currency');
          
             $user=User::find($order->user_id);

                $length = 5; // The desired length of the random string

                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);

                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)]; 
                } 
                
            $response = Http::withHeaders([
                'Authorization' => 'Bearer FLWSECK_TEST-56e0791576171d316a748cab6fb25bda-X',
            ])->post('https://api.flutterwave.com/v3/payments', [
                'tx_ref' =>  $randomString,
                'amount' => $order->total_amount,
                'currency' => $currency,
                'redirect_url' => 'http://127.0.0.1:8000/payment/confirm',
                'meta' => [
                    'consumer_id' => $order->user_id,
                    'consumer_mac' => '234bs-986839-2392a',
                ],
                'customer' => [
                    'email' => $user->email,
                    'phonenumber' => $request->get('phone'),
                    'name' => $user->name,
                ],
                'customizations' => [
                    'title' =>'Plumbing Hub',
                    'logo' => 'https://asset.brandfetch.io/iddYbQIdlK/idJFacjB7W.svg?updated=1668070652216',
                ],
            ]);
 
            $responseJson = $response->json(); 
  
             
            if ($responseJson['data']['link']) {
                Payments::create([
                        'tx_ref'=> $randomString,
                        'order_id'=>$order->id,
                        'payment_date'=>$request->get('payment_date'),
                        'amount'=>$order->total_amount,
                        'payment_method'=>'Flutter',
                        'payed'=>0,
                        'currency'=>$currency,
                        'reference'=>'Flutter',
                        'street_address'=>$request->get('street_address'),
                        'house_address'=>$request->get('house_address'),
                        'state'=>$request->get('state'),
                        'city'=>$request->get('city'),
                        'phone'=>$request->get('phone')
                    ]);
            return redirect()->away($responseJson['data']['link']);
            }
            
        } catch (\Throwable $e) {
            return redirect()->route('payment')->with('error',$e->getMessage()); 
        }


   }






 

    public function handleCallback(Request $request)
    {
        
        try {            
                $order = Session::get('order', []);
                
                $orderData=Orders::find($order->id); 
                
                    $cart_ids=explode(',',$orderData->cart_id);
                    $cartItems = Carts::whereIn('id',$cart_ids)->get();  
                
                $currency=Session::get('currency'); 

                if ($request->query('status') === 'successful') {
                    $transactionDetails = Payments::where('tx_ref', $request->query('tx_ref'))->first(); 

                        $response = Http::withHeaders([
                            'Authorization' => 'Bearer FLWSECK_TEST-56e0791576171d316a748cab6fb25bda-X',
                        ])->get('https://api.flutterwave.com/v3/transactions/' . $request->query('transaction_id') . '/verify');

                    if ($response->successful()) {
                        $responseData = $response->json('data'); 
                        if ($responseData['status'] === 'successful' ) {

                            $transactionDetails->update([
                                            'payed'=>1,
                                            'reference'=>$responseData['auth_model'],
                                            'payment_method'=>$responseData['payment_type']
                                        ]);

                                $orderData->update(['status'=>'paid']); 
                                $orderData->update(['status'=>'paid']); 

                                foreach ($cartItems as $item) {
                                    $item->update(['status'=>'closed']);
                                    
                                }
                                $request->session()->forget(['order', 'currency']);
 
                                return redirect()->route('order.client')->with('success', 'Order payed successfully');
                        } else {
                             $request->session()->forget(['order', 'currency']);
                            return redirect()->route('payment')->with('error','Payment response failed');
                        }
                    } else {
                         $request->session()->forget(['order', 'currency']);
                        return redirect()->route('payment')->with('error','Payment response failed');
                    }
                }
            //code...
        } catch (\Throwable $th) {
            return redirect()->route('payment')->with('error',$th->getMessage());
        }


    }
 
}